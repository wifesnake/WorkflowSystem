<template>
  <h1>{{ msg }}</h1>
</template>

<script>
export default {
    name: "App",
    setup(){
        const msg = "Hello from vue component";
        return { msg }
    },
    mounted() {
        console.log("component mounted");
    },
}
</script>

<style>

</style>
