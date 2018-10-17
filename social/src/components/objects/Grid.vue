<template>
    <span>
        <div :class="'col s'+ tamanho"></div>
    </span>
</template>

<script>
    export default {
      name: 'Grid',
      props: ['tamanho']
    }
</script>