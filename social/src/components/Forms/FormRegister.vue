<template>
    <div class="row">
        <grid-vue tamanho="12">
            <div class="input-field">
                <label for="name">Nome</label>
                <input id="name" name="name" type="text">
            </div>
            <div class="input-field">
                <label for="email">E-mail</label>
                <input id="email" name="email" type="email">
            </div>
            <div class="input-field">
                <label for="password">Senha</label>
                <input id="password" type="text">
            </div>
            <div class="input-field">
                <label for="password">Confirmar Senha</label>
                <input id="password" type="text">
            </div>
            <div class="input-field">
                <a class="btn deep-purple darken-4 waves-effect waves-light">Entrar</a>
                <router-link class="btn deep-purple lighten-2 waves-effect waves-light" to="/login">Já tenho conta</router-link>
            </div>
        </grid-vue>
    </div>
</template>

<script>
   import GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'FormRegister',
      components: {
        GridVue
      }
    }
</script>
