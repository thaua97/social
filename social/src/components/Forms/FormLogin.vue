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
    //import axios
    import axios from 'axios'

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
          axios.post(`http://127.0.0.1:8000/api/login`, {
            email: this.email,
            password:this.password
          })
          .then(response => {
                //console.log(response)
            if(response.data.token){
              sessionStorage.setItem('usuario',JSON.stringify(response.data));
              this.$router.push('/')
                    
            }else if(response.data.status == false){
              alert('Login inválido!')
            }else{
              console.log('erros de validação')
              let erros = '';
              for(let erro of Object.values(response.data)){
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