<template>
    <div class="row">
        <grid-vue tamanho="12">
            <div class="input-field">
                <label for="name">Nome</label>
                <input id="name" name="name" v-model="name" type="text">
            </div>
            <div class="input-field">
                <label for="email">E-mail</label>
                <input id="email" name="email" v-model="email" type="email">
            </div>
            <div class="input-field">
                <label for="password">Senha</label>
                <input id="password" v-model="password" type="password" >
            </div>
            <div class="input-field">
                <label for="password_conf">Confirmar Senha</label>
                <input id="password_conf" v-model="password_confirmation" type="password">
            </div>
            <div class="input-field">
                <a v-on:click="register()" class="btn deep-purple darken-4 waves-effect waves-light">Registrar</a>
                <router-link class="btn deep-purple lighten-2 waves-effect waves-light" to="/login">Já tenho conta</router-link>
            </div>
        </grid-vue>
    </div>
</template>

<script>
   import axios from 'axios'
   
   import GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'FormRegister',
      components: {
        GridVue
      },
      data () {
        return {
          name: '',
          email: '',
          password: '',
          password_confirmation: ''
        }  
      },
      methods:{
        register() {
            this.$http.post(this.$urlAPI+`cadastro`, {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
            })
            .then(response => {
                //console.log(response)
                if(response.data.status){
                    alert('Cadastro efetuado com sucesso!')
                    //Assim que cadastra efetua o login
                    this.$store.commit('setUser', response.data.user)
                    sessionStorage.setItem('usuario',JSON.stringify(response.data.user))
                    this.$router.push('/')
                    
                }else if(response.data.status == false && response.data.validacao){
                    let erros = '';
                    
                    for(let erro of Object.values(response.data.erros)){
                        erros += erro +" ";
                    }

                    alert(erros)
                }else{
                    
                    alert('Erro no cadastro, tente novamente mais tarde!')
                
                }
            })
            .catch(e => {
                alert("Erro! Tente novamente mais tarde :( ")
            })
        }
      }
    }
</script>
