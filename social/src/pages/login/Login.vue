<template>

    <auth-template>
        <span slot="info">
            <h5 class="font-oleo-script">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur nobis deserunt sit modi perspiciatis unde. Enim odit a labore corporis pariatur quam, ex illo nisi accusamus. Repudiandae deserunt inventore veritatis!
            </h5>
        </span>
        <span slot="form">
            <div class="card">
                <div class="card-content">
                    <p>teste</p>
                </div>
            </div>
        </span>
    </auth-template>

</template>

<script>

import AuthTemplate from '@/templates/AuthTemplate'

export default {
  name: 'Login',
  components: {
    AuthTemplate
  }
}
</script>

<style scoped>
    .font-oleo-script {
        font-family: 'Oleo Script', cursive;
        color: #ffffff; 
    }
</style>

