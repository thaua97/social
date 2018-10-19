<template>

<div class="row">
    <div class="card-panel grey lighten-5 z-depth-1">
        <div class="row">
            
            <grid-vue tamanho="4">
                <img src="https://pbs.twimg.com/profile_images/947741683608965121/oWd523rK_400x400.jpg" alt="" class="responsive-img circle">
            </grid-vue>
            
            <grid-vue tamanho="8">
                <span class="text-black">
                    <h5>Carl Johnson</h5>
                    <small>Lorem ipsum dolor sit amet consectetur, adipisicing elit</small>
                </span>
            </grid-vue>
        
        </div>
    </div>
</div>

</template>
<script>
    import  GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'CardUser',
      components: {
        GridVue
      }
    }
</script>