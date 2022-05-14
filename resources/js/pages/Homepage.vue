<template>
    
    <!-- extend layout.vue -->
    <LayoutDefault>

        <!-- Sezione slider posts -->
        <section class="slider_wrapper w-full pt-4">

            <!-- Img wrapper posts -->
            <div class="img_wrapper_post" v-for="(element, index) in posts" :key="index" :class="currentPost == index ? 'block' : 'hidden' " @mouseenter="stopAutoPlaySlider()" @mouseleave="autoPlaySlider()">
                
                <img :src="element.image" alt="" class="w-full object-cover opacity-60">

                <!-- Description -->
                <div class="description text-white font-bold text-lg tracking-wider">
                    <h2 class="title mb-2">{{element.title}}</h2>
                    <p v-if="element.category" class="category mb-2">{{`Categoria: ${element.category.name}`}}</p>
                    <p class="publication_date">{{`Pubblicato il ${element.publication_date}`}}</p>
                </div>
            </div>

            <!-- Lista frecce slider -->
            <ul class="list_arrow_icon flex items-center justify-between w-full px-5">
                <li class="icon_left cursor-pointer h-10 w-10 rotate-180" @click="arrowDown()" @mouseenter="stopAutoPlaySlider()">
                   <img :src="require('/public/img/arrow_icon.svg')" alt="">
                </li>
                <li class="icon_right cursor-pointer h-10 w-10" @click="arrowUp()" @mouseenter="stopAutoPlaySlider()">
                   <img :src="require('/public/img/arrow_icon.svg')" alt="">
                </li>
            </ul>

            <!-- Lista barre controlli -->
            <ul class="list_bar_controls flex items-center justify-center gap-4" @mouseenter="stopAutoPlaySlider()" @mouseleave="autoPlaySlider()">
                <li @click="goToSlide(index)" class="h-2 w-6 rounded-full cursor-pointer shadow-md shadow-black/20" :class="currentPost == index ? 'bg-white' : 'bg-color-gray-2' " v-for="(post, index) in posts" :key="index"></li>
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
            },

            // Funzione click go to slide
            goToSlide: function(i) {
                this.currentPost = i;
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
            -webkit-animation: display 600ms ease-out;
        }

        .description {
            position: absolute;
            bottom: 100px;
            left: 10%;
        }
    }

    .list_arrow_icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);

        li {

            img {

                &:hover {
                    filter: invert(94%) sepia(100%) saturate(0%) hue-rotate(169deg) brightness(105%) contrast(101%);
                    transform: scale(1.15);
                    transition: all 300ms ease-in-out;
                }
            }
        }
    }

    .list_bar_controls {
        position: absolute;
        bottom: 25px;
        left: 50%;
        transform: translateX(-50%);

    }

    @keyframes display {
        from {
            display: none;
            opacity: 0;
        }

        to {
            display: block;
            opacity: 0.60;
        }
    }
}

</style>