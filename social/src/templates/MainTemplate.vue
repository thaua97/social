<template>
  <div>

    <header>
      <navbar cor="bg" logo="Space">
        <li v-if="user">
          <router-link class="orange-text text-lighten-4" to="/perfil">{{user.name}}</router-link>
        </li>
        <li v-for="item in links" :key="item.nome">
            <router-link class="orange-text text-lighten-4" :to="'/'+item.link"> {{item.nome}}</router-link>
        </li>
        <li v-if="user">
          <a class="orange-text text-lighten-4" v-on:click="sair">Sair</a>
        </li>
      </navbar>
    </header>

    <main>
      <div class="section">
        <div class="container">
            <div class="row">

              <grid-vue tamanho="12 m3 l4">
                <div class="section">
                   <slot name="menu"></slot>
                </div>
              </grid-vue>

              <grid-vue tamanho="12 m8 l8">
                <div class="section">
                  <slot name="main"></slot>
                </div>
              </grid-vue>

            </div>
          </div>
        </div>
      
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
  name: 'MainTemplate',
  components: {
    Navbar,
    Rodape,
    GridVue
  },
  data () {
    return {
      user: false,
      links: [ 
        { nome: user.name, link: 'perfil' },
      ]
    }
  },
  created() {
    let userToken = sessionStorage.getItem('usuario')

    if(userToken){
      this.user = JSON.parse(userToken)
    } else {
      this.$router.push('/login')
    }
  },
  methods: {
    sair(){
      sessionStorage.clear()
      this.usuario = false
      this.$router.push('/login')
    }
  }
}
</script>