<template>
    <div>
        <div class="row">
            <div class="input-field">
                <label for="name">Nome</label>
                <input id="name" type="text" v-model="name">
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <label for="email">Email</label>
                <input id="email" type="email" v-model="email">
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field">
                <div class="btn purple waves-effect waves-light">
                    <span>Imagem</span>
                    <input type="file" v-on:change="addImage">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <label for="password">Senha</label>
                <input id="password" type="password" v-model="password">
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <label for="password_confirmation">Confirmar Senha</label>
                <input id="password_confirmation" type="password" v-model="password_confirmation">
            </div>
        </div>
        <div class="row">
            <button v-on:click="perfil()" class="btn btn-block deep-purple darken-4">Atualizar dados</button>
        </div>
    </div>
</template>
<script>
    export default {
      name: 'FormProfile',
      data () {
        return {
            user: '',
            name: '',
            email: '',
            image: '',
            password: '',
            password_confirmation: '',
            
        }
      },
      created() {
        let userToken = sessionStorage.getItem('usuario')
        if(userToken){
            this.user = JSON.parse(userToken);
            this.name = this.user.name;
            this.email = this.user.email;
        }
      },
      methods: {
        addImage(e){
            let file = e.target.files || e.dataTransfer.files;
            if(!file.length){
                return;
            }

            let reader = new FileReader();
            reader.onloadend = (e) => {
                this.image = e.target.result;
            };
            reader.readAsDataURL(file[0]);
        },
        perfil() {

          this.$http.put(this.$urlAPI+`perfil`, {
            name: this.name,
            email: this.email,
            image: this.image,
            password: this.password,
            password_confirmation: this.password_confirmation
          },
          {
            "headers": {
              "authorization" : "Bearer "+this.user.token
            }
          })
          .then(response => {
            if(response.data.status){
                
                this.user = response.data.user;
                sessionStorage.setItem('usuario',JSON.stringify(this.user));
                alert('Perfil atualizado!');

            } else if(response.data.status == false && response.data.validacao) {
                //erros de valdiação
              let erros = '';
              for(let erro of Object.values(response.data.erros)){
                  erros += erro +" ";
              }
                alert(erros)
            }
          })
          .catch(e => {
              alert("Erro! Tente novamente mais tarde :( ")
          })
        }
      }
    }
</script>