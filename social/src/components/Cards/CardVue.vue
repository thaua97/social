<template>
<span>
    <div class="row">
        <grid-vue tamanho="12">
            <div :class="'card ' + cor || ''">
                <div class="card-content">
                    <span v-if="titulo" class="card-title">{{ titulo }}</span>
                    <div class="row">
                        <grid-vue>
                            <slot></slot>
                        </grid-vue>
                    </div>
                </div>
            </div>    
        </grid-vue>
    </div>
</span>        
</template>
<script>
    import  GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'CardVue',
      props: ['titulo', 'cor'],
      components: {
        GridVue
      }
    }
</script>