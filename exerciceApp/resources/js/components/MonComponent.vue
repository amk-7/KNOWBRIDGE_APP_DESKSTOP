<template>
    <!-- Le template -->
    <section class="container" >
        <h1 class="dark:text-white">Mon composant MonComponent.vue</h1>
        <p class="dark:text-white">Clicks : <strong>{{ clicks }}</strong></p>
        <button @click="ajouteClick" >clique sur moi</button>
    </section>
</template>
<script>
// Le script
export default {
    name : "mon-component",
    data () {
        return {
            clicks : 0
        }
    },
    methods : {
        // Incrémentation de "clicks"
        ajouteClick () {
            this.clicks++;
        }
    }
}
</script>
<style scoped>
    /* le style */
    .container {
        max-width: 960px;
        margin: 0 auto; padding: 40px;
        text-align: center;
        font-family: calibri, arial;
    }
</style>
