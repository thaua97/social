<template>

    <main-template>
      <span slot="menu">
        <card-user></card-user>
      </span>
      <span slot="main">
        <content-vue></content-vue>
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
  }
}
</script>
