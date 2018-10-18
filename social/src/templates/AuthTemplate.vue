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
                      <slot name="info"></slot>
                  </grid-vue>
                  <grid-vue tamanho="12 m4 l4">
                      <slot name="form"></slot>
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
  components: {
    Navbar,
    Rodape,
    GridVue
  },
  data () {
    return {
      links: [ 
        { nome: 'Teste', link: 'teste.html' },
        { nome: 'Sair', link: 'login' }
      ]
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
</style>

