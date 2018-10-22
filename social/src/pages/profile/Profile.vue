<template>
    <main-template>
        <span slot="menu">
            <card-user-profile 
            :img="user.image" 
            :nome="user.name"
            />
        </span>
        <span slot="main">
            <card-vue titulo="Dados do usuario">
              <form-profile  />
            </card-vue>  
        </span>
    </main-template>
</template>
<script>
    import MainTemplate from '@/templates/MainTemplate'

    import GridVue from '@/objects/Grid/GridVue'
    
    import CardVue from '@/components/Cards/CardVue'

    import CardUserProfile from '@/components/Cards/CardUserProfile'

    import FormProfile from '@/components/Forms/FormProfile'

    export default {
      name: 'Profile',
      components: {
        MainTemplate,
        GridVue,
        CardVue,
        CardUserProfile,
        FormProfile
      },
      data () {
        return {
          user: false
        }
      },
      created() {
        let userToken = sessionStorage.getItem('usuario')

        if(userToken){
          this.user = JSON.parse(userToken)
        } else {
          this.$router.push('/login')
        }
      },
    }

</script>