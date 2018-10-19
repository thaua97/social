<template>
    <div class="row">
        <grid-vue tamanho="12">
            <div class="input-field">
                <label for="email">E-mail</label>
                <input id="email" type="text">
            </div>
            <div class="input-field">
                <label for="password">Senha</label>
                <input id="password" type="text">
            </div>
            <button class="btn btn-block round deep-purple darken-4 waves-effect waves-light">Entrar</button>
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
      }
    }
</script>