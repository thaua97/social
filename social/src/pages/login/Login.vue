<template>

<auth-template titulo="Login">
    <form-login />
</auth-template>

</template>

<script>

import AuthTemplate from '@/templates/AuthTemplate'
import FormLogin from '@/components/Forms/FormLogin'

export default {
  name: 'Login',
  components: {
    AuthTemplate,
    FormLogin
  },
  data () {
    return {
      cadastro: false
    }
  }
}
</script>


