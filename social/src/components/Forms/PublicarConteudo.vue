<template>

<div class="row">
  <grid-vue tamanho="12">
      <div class="input-field">
        <textarea v-model="conteudo" id="conteudoId" class="materialize-textarea"></textarea>
        <label for="conteudoId">O que ta rolando?</label>
      </div>
      <p>
        <button v-if="conteudo" class="btn waves-effect waves-light deep-purple darken-4 col s12 m2 l2 offset-m10 offset-l10">Publicar</button>
      </p>
  </grid-vue>
</div>

</template>

<script>

    import GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'Publicar',
      components: {
        GridVue
      },
      data () {
        return {
          conteudo: ''
        }
      }
    }
</script>
