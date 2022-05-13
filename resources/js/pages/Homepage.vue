<template>
    
    <!-- extend layout.vue -->
    <LayoutDefault>

        <!-- Sezione slider posts -->
        <section class="slider_wrapper w-full">

            <!-- Img wrapper posts -->
            <div class="img_wrapper_post" v-for="(element, index) in posts" :key="index" :class="currentPost == index ? 'block' : 'hidden' " @mouseenter="stopAutoPlaySlider()" @mouseleave="autoPlaySlider()">
                <img :src="element.image" alt="" class="w-full object-cover">
            </div>

            <!-- Icone controlli slider -->
            <ul class="list_icon flex items-center justify-between w-full px-5">
                <li class="icon_left cursor-pointer h-10 w-10 rotate-180" @click="arrowUp()" @mouseenter="stopAutoPlaySlider()">
                   <img :src="require('/public/img/arrow_icon.svg')" alt="">
                </li>
                <li class="icon_right cursor-pointer h-10 w-10" @click="arrowDown()" @mouseenter="stopAutoPlaySlider()">
                   <img :src="require('/public/img/arrow_icon.svg')" alt="">
                </li>
            </ul>

        </section>

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

        data() {
            return {

                // Array posts
                posts: [],

                // Current post
                currentPost: 0,
            }
        },

        methods: {

            // Funzione chiamata recupero posts
            recuperoPosts: function() {
                axios.get('api/')
                .then( res => {

                    // Recupero i posts dalla risposta
                    const {posts} = res.data;

                    // Assegno la costante posts all'array posts
                    this.posts = posts;

                })
                .catch( err => {
                    console.warn(err);
                })
            },

            // Arrow up change slide
            arrowUp: function() {
                
                if(this.currentPost < 2) {
                    this.currentPost++;
                } else if(this.currentPost == 2) {
                    this.currentPost = 0;
                }
            },

            // Arrow down change slide
            arrowDown: function() {

                if (this.currentPost > 0 ){
                    this.currentPost --;
                } else if (this.currentPost == 0){
                    this.currentPost = 2;
                }
            },

            // Funzione autoplay slider change
            autoPlaySlider: function() {
                this.intervallo = setInterval(this.arrowUp, 2000);
            },

            // Funzione stop autoplay slider
            stopAutoPlaySlider: function() {
                clearInterval(this.intervallo);
            }
        },

        mounted() {
            
            // Richiamo funzione recupero posts
            this.recuperoPosts();

            // Richiamo funzione autoplay slider
            this.autoPlaySlider();
        }
    }
</script>

<style lang="scss" scoped>

.slider_wrapper {
    height: 650px;
    position: relative;
    
    .img_wrapper_post {
        height: 650px;

        img {
            -webkit-animation: display 400ms ease-in-out;
        }
    }

    .list_icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);

        li {

            img {
                filter: invert(100%);

                &:hover {
                    filter: invert(60%);
                    transform: scale(1.1);
                    transition: all 350ms ease-in-out;
                }
            }
        }
    }

    @keyframes display {
        from {
            display: none;
            opacity: 0;
        }

        to {
            display: block;
            opacity: 1;
        }
    }
}

</style>