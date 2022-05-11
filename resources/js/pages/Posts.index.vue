<template>

    <!-- extend layout.vue -->
    <LayoutDefault>
        <!-- Section posts index -->
        <section class="posts_index container py-8 px-4">
    
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
    },

    mounted() {

        // Richiamo la funzione recuperoPosts
        this.recuperoPosts();
    }
}
</script>

<style lang="sass" scoped>

</style>