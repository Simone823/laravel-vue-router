<template>

    <!-- extend layout.vue -->
    <LayoutDefault>
        <!-- Section posts index -->
        <section class="posts_index container py-8 px-4">

            <!-- Categories wrapper -->
            <div class="categories_wrapper">

                <!-- Lista categories -->
                <ul class="list_categories flex items-center justify-center gap-6 mb-16 flex-wrap">
                    <router-link tag="li" :to="{name: 'categories.archive', params: {slug: category.slug}}" v-for="category in categoriesArray" :key="category.id" 
                        class="rounded rounded-md bg-color-lime-1 
                            shadow-md shadow-color-lime-1/50 
                            hover:bg-color-yellow-green-1 
                            hover:-translate-y-1.5
                            hover:shadow-color-yellow-green-1/50 
                            duration-300 
                            text-black font-semibold max-w-max py-1 px-4 cursor-pointer
                        "
                    >
                        {{category.name}}
                    </router-link>
                </ul>
            </div>

            <!-- Tags wrapper -->
            <div class="tags_wrapper">

                <!-- Lista tags -->
                <ul class="list_tags flex items-center justify-center gap-6 mb-16 flex-wrap">
                    <router-link tag="li" :to="{name: 'tags.archive', params: {slug: tag.slug}}" v-for="tag in arrayTags" :key="tag.id" 
                        class="tag rounded rounded-lg bg-color-blue-1 text-black shadow-md shadow-color-blue-1/50 py-1 px-4 font-semibold cursor-pointer
                            hover:bg-color-blue-2 
                            hover:-translate-y-1.5
                            hover:shadow-color-blue-2/50 
                            duration-300 
                            text-black font-semibold max-w-max py-1 px-4 cursor-pointer
                        "
                    >
                        {{tag.name}}
                    </router-link>
                </ul>
            </div>

            <!-- Grid container posts cards wrapper -->
            <div class="posts_cards_wrapper grid grid-cols-1 md:grid-cols-3 lg:grid:cols-4 sm:grid-cols-2 gap-16 mb-16">
                <!-- Componente card post -->
                <PostCard v-for="element in postsArray" :key="element.id" :arrayPosts="element"/>
            </div>
    
            <!-- Pages -->
            <ul class="pages_control flex items-center justify-center gap-8 flex-wrap">
               <li v-for="number in lastPage" :key="number" 
                    :class="[
                        currentPage === number ? 'bg-gradient-to-r from-pink-500 to-yellow-500' : 'bg-gradient-to-r from-cyan-500 to-blue-500', 
                        'dot hover:from-pink-500 hover:to-yellow-500 rounded-full h-11 w-11 flex items-center justify-center cursor-pointer text-base font-bold'
                    ]"
                    @click="recuperoPosts(number)"
                >
                    {{number}}
                </li> 
            </ul>
    
        </section>
    </LayoutDefault>

</template>

<script>
import Axios from "axios";

// Import layout
import LayoutDefault from '../layouts/layout.vue';

// Import post card
import PostCard from '../components/CardPost.vue';

export default {
    components: {
        LayoutDefault,
        PostCard,
    },

    data() {
        return {

            // Array posts
            postsArray: [],

            
            // Array categories
            categoriesArray: [],

            // Array tags
            arrayTags: [],

            // Current page
            currentPage: 1,

            // Last page
            lastPage: 0,

        }
    },

    methods: {

        // Funzione chiamata axios per recuperare i dati dei posts
        recuperoPosts: function(page = 1) {

            // Axios
            Axios.get('/api/posts', {
                params: {
                    page: page, 
                }
            })
            .then( res => {

                // Recupero la risposta la pagina corrente, l'ultima pagina
                const {posts} = res.data
                const {data, last_page, current_page} = posts;

                // Pusho i la risposta nell'array posts
                this.postsArray = data;

                // Current page
                this.currentPage = current_page;

                // Lastpage
                this.lastPage = last_page;
            })
            .catch( err => {
                console.warn(err);
            })

            // Scroll to top 0px
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },

        
        // Funzione chiamata server recupero categories
        recuperoCategories: function() {
            // Axios
            Axios.get('/api/categories')
            .then( res => {

                // Recupero le categorie
                const {categories} = res.data;

                // Pusho i la risposta nell'array categories
                this.categoriesArray = categories;
            })
            .catch( err => {
                console.warn(err);
            })

            // Scroll to top 0px
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },

        // Funzione chiamata server recupero tags
        recuperoTags: function() {
            axios.get('/api/tags')
            .then( res => {

                // Recupero con la destrutturazione i tags
                const {tags} = res.data;

                // Pusho la risposta con i tags nell'array tags
                this.arrayTags = tags;
            })
        },

    },

    mounted() {

        // Richiamo la funzione recuperoPosts
        this.recuperoPosts();

        // Richiamo funzione recupero categories
        this.recuperoCategories();

        // Richiamo funzione recupero tags
        this.recuperoTags();
    }
}
</script>

<style lang="scss" scoped>

.tags_wrapper {

    .list_tags {

        li {

            &::before {
                content: '#';
                display: inline-block;
                font-weight: 600;
            }
        }
    }
}

</style>