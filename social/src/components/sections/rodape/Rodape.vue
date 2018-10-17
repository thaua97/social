<template>
    <span>

        <footer class="page-footer degrad">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Sobre nós</h5>
                <p class="grey-text text-lighten-4">
                  <slot name="sobre"></slot>
                </p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <slot name="links"></slot>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright degrad">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
            
    </span>
</template>
<script>
    export default {
      name: 'rodape',
      data () {
        return {
              
        }
      }
    }
</script>
<style scoped>
.degrad {
    background: -webkit-linear-gradient(45deg, #f7010e 0%, #f18487 100%);
    background-color: #f18487;
}
</style>

