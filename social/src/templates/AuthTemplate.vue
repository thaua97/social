<template>
  <div class="bga">

    <header>
      <navbar cor="transparent z-depth-0" logo="Space">
            <li v-for="item in links" :key="item.nome">
                <router-link class="orange-text text-lighten-4" :to="'/'+item.link"> {{item.nome}}</router-link>
            </li>
      </navbar>
    </header>

    <main>
      <section class="section">
          <div class="container">
              <div class="row">
                  <grid-vue tamanho="12 m8 l8">
                      <h5 class="font-oleo-script">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur nobis deserunt sit modi perspiciatis unde. Enim odit a labore corporis pariatur quam, ex illo nisi accusamus. Repudiandae deserunt inventore veritatis!</h5>
                  </grid-vue>
                  <grid-vue tamanho="12 m4 l4">
                    <div class="card round z-depth-3">
                      <div class="card-content">
                          <div class="card-title">{{ titulo }}</div>
                          <slot />
                      </div>
                    </div>
                  </grid-vue>
              </div>
          </div>
      </section>
    </main>

    <footer>
      <rodape>
        <span slot="sobre">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae dolorem facere earum at accusantium voluptate vitae sit harum? Impedit tempore distinctio eaque doloribus nemo quidem? Tenetur quas sequi eaque nobis.
        </span>
        <span slot="links">
            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
        </span>
      </rodape>
    </footer>
    
  </div>
</template>

<script>

import Navbar from '@/components/Navbar/Navbar'
import Rodape from '@/components/Rodape/Rodape'

import GridVue from '@/objects/Grid/GridVue'

export default {
  name: 'AuthTemplate',
  props: ['titulo'],
  components: {
    Navbar,
    Rodape,
    GridVue
  },
  data () {
    return {
      usuario: false,
      links: [ 
        { nome: 'Registrar-se', link: 'register' },
        { nome: 'Sobre o projeto', link: 'l' }
      ]
    }
  },
  created() {
    //utilizado para buscar os dados do usuario no navegador.
    let userToken = sessionStorage.getItem('usuario')

    if(userToken){
      this.usuario = JSON.parse(userToken)
      this.$router.push('/');
    }
  },
  methods: {
    sair(){
      sessionStorage.clear();
      this.usuario = false;
    }
  }
}
</script>
<style scoped>
  .bga {
    background-image: url('/static/img/bg.jpg');
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
  }

  .font-oleo-script {
    font-family: 'Oleo Script', cursive;
    color: #ffffff; 
  }
  
  .round {
    border-radius: 15px;
  }
</style>

