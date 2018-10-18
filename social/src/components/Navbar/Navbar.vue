<template>
    <div>
        <nav :class="cor">
            <div class="nav-wrapper container">
                <router-link class="brand-logo" to="/" >{{ logo }}</router-link>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li 
                        v-for="item in lista"
                        :key="item.nome"    
                    >
                        <a class="orange-text text-lighten-4" :href="item.link"> {{item.nome}}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
      name: 'Navbar',
      props: ['cor', 'logo', 'url'],
      data () {
        return {
          lista: [ 
            { nome: 'Teste', link: 'teste.html' },
            { nome: 'teste 2', link: 'teste2.html' }
          ]
        }
      }
    }
</script>

<style scoped>
.brand-logo {
  font-family: 'Monoton', cursive;
}
.bg {
    background: #2819ff linear-gradient(45deg, #4322ff, #ad20ff);
}
</style>
