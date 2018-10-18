<template>

        <div class="card">
            <div class="card-content">
                <div class="row">
                    <grid-vue tamanho="1">
                        <img :src="perfil" alt="" class="responsive-img circle">
                    </grid-vue>
                    
                    <grid-vue tamanho="11">
                        <span class="black-text">
                            <strong>{{ nome }}</strong> - <small>{{ data }}</small>
                        </span>
                    </grid-vue>
                </div>
                <slot></slot>
                
            </div>
            <div class="card-action">
                <p>
                    <i class="material-icons">favorite_boder</i>
                    <i class="material-icons">insert_comment</i>
                </p>
            </div>
        </div>

</template>
<script>
    import  GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'CardContent',
      props: ['perfil', 'nome', 'data'],
      components: {
        GridVue
      }
    }
</script>