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
          :linkUsr="item.user.id"
          :data="item.date">
            <card-detail 
              :title="item.title" 
              :img="item.image"
              :text="item.text" />
        </card-content>

        <p v-if="this.npu" class="grey-text">mais...</p>
        <p v-else class="center-align grey-text">Não existe mais conteudo!</p>
        <div v-scroll="handleScroll"></div>
    </span>
</template>

<script>
    import CardContent from '@/components/Cards/CardContent'
    import CardDetail from '@/components/Cards/CardDetail'
    import PublicarConteudo from '@/components/Forms/PublicarConteudo'

    import GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'ContentUser',
      components: {
        CardContent,
        CardDetail,
        PublicarConteudo,
        GridVue
      },
      data () {
        return {
          user: false,
          npu: null,
          stopScroll: false,
          pageMaster: {image: '', name: ''}
        }
      },
      created() {
        let userToken = this.$store.getters.getUser

        if(userToken){
          this.user = this.$store.getters.getUser
          
          this.$http.get(this.$urlAPI+`content/page/list/`+this.$route.params.id, 
          {
            "headers": {
              "authorization" : "Bearer "+this.$store.getters.getToken
            }
          })
          .then(response => {
            //console.log(response)
            if(response.data.status){
              this.$store.commit('setTimeLine', response.data.content.data)
              this.npu = response.data.content.next_page_url
              this.pageMaster = response.data.master
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
      },
      methods: {
        handleScroll() {
         //console.log(window.scrollY)
         //console.log(document.body.clientHeight)
        if (this.stopScroll) {
          return
        }
        if (window.scrollY >= document.body.clientHeight - 949) {
          this.stopScroll = true
          this.loadList()
        }

        },
        //metodo carrega os novos conteudos atraves da next_page_url do laravel;
        loadList() {
          if(!this.npu){
            return
          }
          this.$http.get(this.npu, 
          {
            "headers": {
              "authorization" : "Bearer "+this.$store.getters.getToken
            }
          })
          .then(response => {
            //console.log(response)
            if(response.data.status){
              this.$store.commit('setContentTimeLine', response.data.content.data)
              this.npu = response.data.content.next_page_url
              this.stopScroll = false
            }
          })
          .catch(e => {
              alert("Erro! Tente novamente mais tarde :( ")
          })
        }
      }
    }
</script>
