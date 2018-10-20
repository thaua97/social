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
      methods: {
          login (){
            axios.post('http://localhost:8000/api/login', {
                email: this.email ,
                password: this.password
            })
            .then(function (response) {
                console.log(response)
            })
            .catch(function (error) {
                console.log(error)
            })
          }
      }
    }
</script>