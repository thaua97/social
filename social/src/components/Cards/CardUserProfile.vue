<template>

<div class="row">
    <grid-vue tamanho="12">

      <div class="card">
        <div class="card-image">
          <img :src="img" class="resposive-img">
        </div>
        <div class="card-content">
          <h5>{{nome}}</h5>
        </div>
      </div>
      
    </grid-vue>
</div>

</template>
<script>
    import  GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'CardUserProfile',
      props: ['img', 'nome'],
      components: {
        GridVue
      }
    }
</script>