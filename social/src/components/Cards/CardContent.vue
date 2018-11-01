<template>

        <div class="card">
            <div class="card-content">
                <div class="row">
                    <grid-vue tamanho="1">
                        <router-link class="black-text" :to="'/pagina/'+linkUsr"><img :src="perfil" alt="" class="responsive-img circle"></router-link>
                    </grid-vue>
                    
                    <grid-vue tamanho="11">
                        <span class="black-text">
                            <strong><router-link class="black-text" :to="'/pagina/'+linkUsr">{{ nome }}</router-link></strong> - <small>{{ data }}</small>
                        </span>
                    </grid-vue>
                </div>
                <slot></slot>  
            </div>

            <div class="card-action">
                <div>
                    <a style="cursor:pointer; color:#000000;" @click="liked(id)">
                        <i v-if="this.like == 'favorite'" class="red-text material-icons">{{ like }}</i>
                        <i v-else class="grey-text material-icons">{{ like }}</i>
                        <span class="red-text" v-if="this.totalLikes > 0">{{ totalLikes }}</span>
                    </a>
                    <a style="cursor:pointer" @click="openComments()"> 
                        <i class="blue-text material-icons">insert_comment</i>
                        <span class="blue-text" v-if="this.comments > '0'" > {{ comments.length }}</span>
                    </a>
                </div>

                <div v-if="showCommnet" class="row">
                    <grid-vue tamanho="10">
                        <div class="input-field">
                            <label for="commet">Comentar</label>
                            <input id="comment" type="text" v-model="textComment">
                        </div>
                    </grid-vue>
                    <grid-vue tamanho="2">
                        <button v-if="textComment" @click="sendComment(id)" style="margin-top:20px" class="btn btn-floating waves-effect waves-light deep-purple lighten-2">
                            <i class="white-text material-icons">send</i>
                        </button>
                    </grid-vue>
                </div>

                <div v-if="showCommnet" class="row">
                    
                    <blockquote v-for="item in comments" :key="item.id">
                        <ul class="collection"> 
                            <li class="collection-item avatar">
                                <img :src="item.user.image" alt="" class="circle">
                                <span class="title">{{item.user.name}} - <small>{{item.date}}</small></span>
                                <p>
                                    <small>{{item.text}}</small>
                                </p>
                            </li>
                        </ul>
                    </blockquote>
                
                </div>
            </div>
        </div>

</template>
<script>
    import  GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'CardContent',
      props: ['id', 'perfil', 'nome', 'linkUsr', 'data', 'tlikes', 'comments', 'likeContent'],
      components: {
        GridVue
      },
      data () {
        return {
            textComment: '',
            totalLikes: this.tlikes,
            showCommnet: false,
            like: this.likeContent ? 'favorite' : 'favorite_border'
        }
      },
      methods: {
        liked(id) {
          this.$http.put(this.$urlAPI+`content/like/`+id,{}, 
            {
              "headers": {
                "authorization" : "Bearer "+this.$store.getters.getToken
              }
            }
          )
          .then(response => {
              if(response.status){
                  this.totalLikes = response.data.likes
                  this.$store.commit('setTimeLine', response.data.list.content.data)
                  if (this.like == 'favorite_border') {
                      this.like = 'favorite'
                  } else {
                      this.like = 'favorite_border'
                  }
              } else {
                  alert(response.data.error)
              }
          })
          .catch(e => {
              console.log(e)
              alert("Erro! Tente novamente mais tarde!")
          })
        },
        openComments() {
            this.showCommnet = !this.showCommnet
        },
        sendComment(id) {
          if(!this.textComment){
            return
          }
          this.$http.put(this.$urlAPI+`content/comment/`+id, 
          {
            text: this.textComment
          }, 
            {
              "headers": {
                "authorization" : "Bearer "+this.$store.getters.getToken
              }
            }
          )
          .then(response => {
              if(response.status){
                this.textComment = ''
                this.$store.commit('setTimeLine', response.data.list.content.data)
                  
              } else {
                  alert(response.data.error)
              }
          })
          .catch(e => {
              console.log(e)
              alert("Erro! Tente novamente mais tarde!")
          })
        }
      }
    }
</script>
