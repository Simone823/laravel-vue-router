<template>
    
    <!-- extend layout.vue -->
    <LayoutDefault>
        <div>
            <h1>Homepage</h1>
        </div>
    </LayoutDefault>

</template>

<script>
// Import layout default
import LayoutDefault from '../layouts/layout.vue';

    export default {
        name: 'Homepage',

        components: {
            LayoutDefault,
        },
    }
</script>

<style lang="scss" scoped>

</style>