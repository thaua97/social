<template>
    <span>
        <publicar-conteudo></publicar-conteudo>
        <card-content v-for="item in lista" :key="item.id"
          :id="item.id"
          :tlikes="item.total_likes"
          :comments="item.comments"
          :likeContent="item.content_like"
          :perfil="item.user.image" 
          :nome="item.user.name" 
          :data="item.date">
            <card-detail 
              :title="item.title" 
              :img="item.image"
              :text="item.text" />
        </card-content>
    </span>
</template>

<script>
    import CardContent from '@/components/Cards/CardContent'
    import CardDetail from '@/components/Cards/CardDetail'
    import PublicarConteudo from '@/components/Forms/PublicarConteudo'

    import GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'Content',
      components: {
        CardContent,
        CardDetail,
        PublicarConteudo,
        GridVue
      },
      data () {
        return {
          user: false,
        }
      },
      created() {
        let userToken = this.$store.getters.getUser

        if(userToken){
          this.user = this.$store.getters.getUser
          
          this.$http.get(this.$urlAPI+`content/list`, 
          {
            "headers": {
              "authorization" : "Bearer "+this.$store.getters.getToken
            }
          })
          .then(response => {
            console.log(response)
            if(response.data.status){
              this.$store.commit('setTimeLine', response.data.content.data)
            }
          })
          .catch(e => {
              alert("Erro! Tente novamente mais tarde :( ")
          })
        }
      },
      computed: {
        //Observador da lista
        lista(){
          return this.$store.getters.getTimeLine
        }
      }
    }
</script>
