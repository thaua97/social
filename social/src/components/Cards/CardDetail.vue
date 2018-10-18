<template>
    <span>

        <div v-if="img" class="card-image">
            <img :src="img" alt="" />
            <span class="card-title white-text">
                {{titulo || ''}}
            </span>
        </div>
            
        <div v-if="txt" class="card-content black-text">
            <p>{{ txt }}</p>
        </div>

    </span>
</template>

<script>
    import  GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'CardDetail',
      props: ['img', 'titulo', 'txt'],
      components: {
        GridVue
      }
    }
</script>