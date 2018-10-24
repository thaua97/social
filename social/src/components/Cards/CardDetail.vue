<template>
    <span>
        <div v-if="img && img != '#'" class="card-image">
            <img :src="img" alt="" />
            <span class="card-title white-text">
                {{ title }}
            </span>
        </div>     
        <div v-if="txt" class="card-content black-text">
            <article>
                <h4 v-if="img === '#'">{{ title }}</h4>
                <p>{{ txt }}</p>
            </article>
        </div>
    </span>
</template>

<script>
    import  GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'CardDetail',
      props: ['img', 'title', 'txt'],
      components: {
        GridVue
      }
    }
</script>