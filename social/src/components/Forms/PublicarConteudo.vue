<template>

<div class="row">
  <grid-vue tamanho="12">
      <div class="input-field">
        <input id="title" type="text" v-model="content.title">
        <label for="title">O que ta rolando?</label>
      </div>
        
      <div v-if="content.title" class="input-field">
        <textarea id="text" class="materialize-textarea" v-model="content.text" ></textarea>
        <label for="text">Conteudo</label>
      </div>

      <div v-if="content.title && content.text" class="input-field">
        <input id="image" type="text" v-model="content.image">
        <label for="image">URL Imagem</label>
      </div>
        
      <p class="right-align">
        <button v-if="content.title && content.text" @click="addContent()" class="btn waves-effect waves-light deep-purple darken-4">Publicar</button>
      </p>
  </grid-vue>
</div>

</template>

<script>

    import GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'PublicarConteudo',
      components: {
        GridVue
      },
      data () {
        return {
          content: {
            title: '',
            text: '',
            image: ''
          }
        }
      },
      methods: {
        addContent(){
          this.$http.post(this.$urlAPI+`content/add`, {
            title: this.content.title,
            text: this.content.text,
            image: this.content.image
          },
          {
            "headers" : {
              "authorization" : "Bearer "+this.$store.getters.getToken
            }
          })
          .then(response => {
              if(response.data.status){
                console.log(response.data.content);
                this.content = {title:'', text:'', image:''};
                this.$store.commit('setTimeLine', response.data.content.data);
                
              } else if (response.data.status == false && response.data.validacao){
                //erros de validação
                let erros = '';
                for(let erro of Object.values(response.data.erros)){
                    erros += erro +" "
                }
                alert(erros)

              } else {
                alert('Login invialido')
              } 
          })
          .catch(e => {
              console.log(e);
              alert("Erro! Deu ruim! Tente denovo ou mais tarde")
          })        
        }
      }
    }
</script>
