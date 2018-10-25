<template>
    <article>
        <div v-if="img && img != '#'" class="card-image">
            <img :src="img" alt="" />
            <span class="card-title white-text">
                {{ title }}
            </span>
        </div>     
        <div v-if="text" class="card-content black-text">
            <div>
                <h4 v-if="img === '#'">{{ title }}</h4>
                <p>{{ text }}</p>
            </div>
        </div>
    </article>
</template>

<script>
    import  GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'CardDetail',
      props: ['img', 'title', 'text'],
      components: {
        GridVue
      }
    }
</script>