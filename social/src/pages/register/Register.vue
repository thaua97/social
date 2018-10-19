<template>

<auth-template titulo="Cadastre-se">
    <form-register />
</auth-template>

</template>

<script>

import AuthTemplate from '@/templates/AuthTemplate'
import FormRegister from '@/components/Forms/FormRegister'

export default {
  name: 'Register',
  components: {
    AuthTemplate,
    FormRegister
  },
  data () {
    return {
      cadastro: false
    }
  }
}
</script>
