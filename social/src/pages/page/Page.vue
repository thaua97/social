<template>

    <main-template>
      <span slot="menu">
        <card-user></card-user>
      </span>
      <span slot="main">
        <content-user></content-user>
      </span>
    </main-template>

</template>

<script>
import MainTemplate from '@/templates/MainTemplate'

import CardUser from '@/components/Cards/CardUser'

import ContentUser from '@/sections/ContentUser'

export default {
  name: 'Page',
  components: {
    MainTemplate,
    CardUser,
    ContentUser
  }
}
</script>
