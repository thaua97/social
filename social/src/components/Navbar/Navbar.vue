<template>
    <div>
        <nav :class="cor">
            <div class="nav-wrapper container">
                <router-link class="brand-logo" to="/" >{{ logo }}</router-link>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <slot />
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
