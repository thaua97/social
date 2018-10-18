<template>

    <auth-template>
        <span slot="info">
            <h5 class="font-oleo-script">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur nobis deserunt sit modi perspiciatis unde. Enim odit a labore corporis pariatur quam, ex illo nisi accusamus. Repudiandae deserunt inventore veritatis!
            </h5>
        </span>
        <span slot="form">
            <div class="card z-depth-3">
                
                <div class="card-content">
                    <div class="card-title">Login</div>
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
                            <button class="btn btn-block deep-purple darken-4 waves-effect waves-light">Entrar</button>
                        </grid-vue>
                    </div>
                </div>
            </div>
        </span>
    </auth-template>

</template>

<script>

import AuthTemplate from '@/templates/AuthTemplate'

export default {
  name: 'Login',
  components: {
    AuthTemplate
  }
}
</script>

<style scoped>
    .font-oleo-script {
        font-family: 'Oleo Script', cursive;
        color: #ffffff; 
    }
    .void{
      background: #ffffff linear-gradient(45deg, #dddddd, #ffffff);
    }
</style>

