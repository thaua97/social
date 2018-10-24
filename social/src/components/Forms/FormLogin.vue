<template>
    <div class="row">
        <grid-vue tamanho="12">
            <div class="input-field">
                <label for="email">E-mail</label>
                <input id="email" type="email" v-model="email">
            </div>
            <div class="input-field">
                <label for="password">Senha</label>
                <input id="password" type="password" v-model="password">
            </div>
            <button v-on:click="login" class="btn btn-block round deep-purple darken-4 waves-effect waves-light">Entrar</button>
            <router-link class="btn deep-purple lighten-2 waves-effect waves-light" to="/register">Registrar</router-link>
        </grid-vue>
    </div>
</template>

<script>
    import GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'FormLogin',
      components: {
        GridVue
      },
      data () {
        return {
          email: '',
          password: ''
        }
      },
      methods:{
        login(){
          this.$http.post(this.$urlAPI+`login`, {
            email: this.email,
            password:this.password
          })
          .then(response => {
                //console.log(response)
            if(response.data.status){
              this.$store.commit('setUser', response.data.user)
              sessionStorage.setItem('usuario',JSON.stringify(response.data.user))
              this.$router.push('/')
                    
            } else if(response.data.status == false && response.data.validacao){
              
              let erros = '';
              for(let erro of Object.values(response.data.erros)){
                  erros += erro +" "
              }
              alert(erros)

            } else {
              alert('Login invialido')
            }
          })
          .catch(e => {
            alert("Erro! Tente novamente mais tarde :( ")
          })
        }
      }
    }
</script>