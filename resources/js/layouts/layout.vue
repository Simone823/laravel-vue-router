<template>

    <!-- Layout default -->
    <div id="app" class="layout_default bg-stone-800 text-white">

        <!-- Header nav -->
        <header class="py-4 px-8 bg-stone-900 shadow-sm shadow-white/30 w-full fixed z-50 flex gap-y-4 flex-col">

            <!-- Menu wrapper-->
            <div class="menu_wrapper flex items-center gap-x-48">
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

                <!-- Icon menu -->
                <ul class="hamburger_icon hidden">
                    <li class="h-8 w-8" :class="hamburgerMenuOpen == false ? 'block' : 'hidden'" @click="openCloseHamburgerMenu()">
                        <img :src="require('/public/img/menu_icon.svg')" alt="">
                    </li>
                    <li class="h-8 w-8" :class="hamburgerMenuOpen == true ? 'block' : 'hidden'" @click="openCloseHamburgerMenu()">
                        <img :src="require('/public/img/close_icon.svg')" alt="">
                    </li>
                </ul>
            </div>

            <!-- Menu nav link max width 768 -->
            <div v-if="hamburgerMenuOpen == true" class="nav-menu-768 w-full hidden">
                <ul class="uppercase tracking-widest font-semibold text-color-blue-3">
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
            </div>
        </header>

        <!-- Main slot pages-->
        <main class="pt-28">
            <slot/>
        </main>

    </div>

</template>

<script>
    export default {
        name: 'LayoutDefault',

        data() {
            return {

                // Hamburger menu open
                hamburgerMenuOpen: false,
            }
        },

        methods: {

            // Open and close hamburger menu
            openCloseHamburgerMenu: function() {
                this.hamburgerMenuOpen = !this.hamburgerMenuOpen;
            }
        }
    }
</script>

<style lang="scss" scoped>

header {

    .router-link-exact-active {
        color: white;
    }
}

@media screen and (max-width: 768px) {
    header {
        
        .menu_wrapper {
            justify-content: space-between;
            gap: 45px;
            row-gap: 25px;

            .nav-menu {
                display: none;
            }

            .hamburger_icon {
                display: block;
            }

        }

        

        .nav-menu-768 {
            display: block;
        }
    }
}

</style>