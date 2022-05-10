<template>

    <!-- Container -->
    <section class="container flex flex-col items-center justify-center gap-6 text-4xl">

        <!-- Error number -->
        <h1>404</h1>

        <!-- Description -->
        <p class="uppercase">Page not found</p>

    </section>

</template>

<script>
    export default {
        name: '404'
    }
</script>

<style lang="scss" scoped>

section {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateY(-50%) translateX(-50%);
}

</style>