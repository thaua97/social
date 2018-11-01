<template>

<div class="row">
    <div class="card-panel grey lighten-5 z-depth-1">
        <div class="row">
            
            <grid-vue tamanho="4">
                <img :src="user.image || 'https://pbs.twimg.com/profile_images/947741683608965121/oWd523rK_400x400.jpg'" :alt="user.name" class="responsive-img circle">
            </grid-vue>
            
            <grid-vue tamanho="8">
                <div class="row">
                    <span class="text-black">
                        <router-link class="title black-text" :to="usrLink">{{ user.name || ' '}}</router-link>
                        <small>Lorem ipsum dolor sit amet consectetur, adipisicing elit</small>
                    </span>
                </div>
            </grid-vue>
        
        </div>
    </div>
</div>

</template>
<script>
    import GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'CardUser',
      components: {
        GridVue
      },
      data () {
        return {
          user: false,
          usrLink: ''
        }
      },
      created() {
        let userToken = this.$store.getters.getUser
        if(userToken){
          this.user = this.$store.getters.getUser
          this.usrLink = '/pagina/'+ this.user.id
        }
      }
    }
</script>
<style scoped>
    .title {
        font-size: 1.9rem;
    }
</style>
