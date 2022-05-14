<template>

    <!-- Layout default -->
    <div id="app" class="layout_default bg-stone-800 text-white">

        <!-- Header nav -->
        <header class="py-4 px-8 bg-stone-900 shadow-sm shadow-white/30 w-full fixed z-50 flex items-center gap-x-48">

            <!-- Logo -->
            <figure class="logo_wrapper h-16 w-72">
                <router-link to="/">
                    <img :src="require('/public/img/boolpress_logo.svg')" alt="">
                </router-link>
            </figure>

            <!-- Nav link -->
            <nav class="nav-menu grow">
                <ul class="flex items-center gap-8 uppercase tracking-widest font-semibold text-color-blue-3">
                    <li>
                        <router-link class="hover:text-white duration-500" to="/">Homepage</router-link>
                    </li>
                    <li>
                        <router-link class="hover:text-white duration-500" to="/posts">Posts</router-link>
                    </li>
                    <li>
                        <router-link class="hover:text-white duration-500" to="/categories">Categories</router-link>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Main slot pages-->
        <main class="pt-28">
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

header {

    .router-link-exact-active {
        color: white;
    }
}

</style>