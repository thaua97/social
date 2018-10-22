<template>
    <span>
        <div v-if="tamanho" :class="'col s'+ tamanho">
            <slot></slot>
        </div>
        <div v-else class="col s12">
            <slot></slot>
        </div>
    </span>
</template>

<script>
    export default {
      name: 'Grid',
      props: ['tamanho']
    }
</script>