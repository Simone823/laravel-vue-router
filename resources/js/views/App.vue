<template>

    <!-- App vue -->
    <div id="app" class="bg-stone-800 text-white">

        <!-- Header nav -->
        <header class="py-8 px-4 mb-4">
            <nav class="nav-menu">
                <ul class="flex items-center justify-center gap-8">
                    <li>Home</li>
                    <li>Posts</li>
                    <li>Categories</li>
                </ul>
            </nav>
        </header>

        <!-- Main -->
        <main class="container">
            <PostsIndex/>
        </main>
    </div>
    
</template>


<script>
// Import posts index
import PostsIndex from '../views/Posts.index.vue';

export default {
    components: {
        PostsIndex,
    },

    name: 'App',    
}
</script>


<style lang="scss" scoped>

#app {
    min-height: 100vh;
}

</style>