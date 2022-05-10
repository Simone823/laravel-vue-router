<template>

    <!-- App vue -->
    <div id="app" class="bg-stone-800 text-white">

        <!-- Header nav -->
        <header class="py-8 px-4 mb-4">
            <nav class="nav-menu">
                <ul class="flex items-center justify-center gap-8 uppercase">
                    <li>
                        <router-link to="/">Homepage</router-link>
                    </li>
                    <li>
                        <router-link to="/posts">Posts</router-link>
                    </li>
                    <li>
                        <router-link to="">Categories</router-link>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Main -->
        <main class="container">
            <router-view></router-view>
        </main>
    </div>
    
</template>


<script>
export default {
    name: 'App',
}
</script>


<style lang="scss" scoped>

#app {
    min-height: 100vh;
}

</style>