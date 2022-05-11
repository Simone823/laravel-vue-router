<template>

    <!-- Layout default -->
    <div id="app" class="layout_default bg-stone-800 text-white">

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

        <!-- Main slot pages-->
        <main>
            <slot/>
        </main>

    </div>

</template>

<script>
    export default {
        name: 'LayoutDefault'
    }
</script>

<style lang="scss" scoped>

</style>