<template>
  <div>
    <header>
      <navbar cor="teal lighten-3" logo="Teste"></navbar>
    </header>
    <main>

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
import Navbar from '@/components/sections/navbar/Navbar'
import Rodape from '@/components/sections/rodape/Rodape'

export default {
  name: 'Home',
  components: {
    Navbar,
    Rodape
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
