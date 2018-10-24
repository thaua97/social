<template>
    <span>
        <publicar-conteudo></publicar-conteudo>
        <card-content 
          perfil="https://pbs.twimg.com/profile_images/947741683608965121/oWd523rK_400x400.jpg" 
          nome="Carl Johnson" 
          data="30/10/18">
            <card-detail 
              titulo="Me and ma niggas" 
              img="https://i.ytimg.com/vi/2FlYSbh7Vmk/maxresdefault.jpg" />
        </card-content>

        <card-content 
          perfil="https://pbs.twimg.com/profile_images/947741683608965121/oWd523rK_400x400.jpg" 
          nome="Carl Johnson" 
          data="30/10/18">
            <card-detail 
              titulo="Me and ma niggas" 
              txt="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium ipsa doloremque odit dolorum aliquam aspernatur quod porro laboriosam adipisci eveniet dolore, ea nulla sit sint magnam, cumque voluptatem laborum iusto!" />
        </card-content>

    </span>
</template>

<script>
    import CardContent from '@/components/Cards/CardContent'
    import CardDetail from '@/components/Cards/CardDetail'
    import PublicarConteudo from '@/components/Forms/PublicarConteudo'

    import GridVue from '@/objects/Grid/GridVue'

    export default {
      name: 'Content',
      components: {
        CardContent,
        CardDetail,
        PublicarConteudo,
        GridVue
      }
    }
</script>
