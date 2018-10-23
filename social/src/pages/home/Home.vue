<template>

    <main-template>
      <span slot="menu">
        <card-user></card-user>
      </span>
      <span slot="main">
        <content-vue :usuario="user"></content-vue>
      </span>
    </main-template>

</template>

<script>
import MainTemplate from '@/templates/MainTemplate'

import CardUser from '@/components/Cards/CardUser'

import ContentVue from '@/sections/ContentVue'

export default {
  name: 'Home',
  components: {
    MainTemplate,
    CardUser,
    ContentVue
  },
  data () {
    return {
      user: false
    }
  },
  created() {
    let userToken = sessionStorage.getItem('usuario')
    if(userToken){
      this.user = JSON.parse(userToken);
      this.name = this.user.name;
      this.email = this.user.email;
    }
  }
}
</script>
