<template>

    <!-- Layout default -->
    <LayoutDefault>

        <!-- Sezione category archive -->
        <section class="category_archive container py-8 px-4">

            <!-- Category name -->
            <div class="category_name text-center mb-16">
                <h1 v-if="category" class="rounded rounded-md bg-lime-400 text-black font-semibold py-1 px-4 max-w-max m-auto">{{category.name}}</h1>
            </div>

            <!-- Grid container posts cards wrapper -->
            <div class="posts_cards_wrapper grid grid-cols-1 md:grid-cols-3 lg:grid:cols-4 sm:grid-cols-2 gap-16">
                
                <!-- Card -->
                <div v-for="element in posts" :key="element.id" class="card_post rounded-md overflow-hidden">

                    <!-- Img wrapper -->
                    <figure class="img_wrapper_post w-full h-52 overflow-hidden cursor-pointer">
                        <router-link :to="{name: 'posts.show', params: {slug: element.slug} }">
                            <img :src="element.image" alt="" class="w-full object-cover">
                        </router-link>
                    </figure>

                    <!-- Description card -->
                    <div class="description_post p-5">

                        <!-- Title -->
                        <router-link :to="{name: 'posts.show', params: {slug: element.slug} }">
                            <h3 class="title mb-5 text-xl max-w-max hover:text-cyan-300 transition-colors duration-300">{{element.title}}</h3>
                        </router-link>

                        <!-- Description -->
                        <p class="description description text-gray-300 leading-loose">{{element.description}}</p>
                    </div>

                </div>
            </div>

        </section>

    </LayoutDefault>

</template>

<script>
// Import layout default
import LayoutDefault from '../layouts/layout.vue';

import PostCard from '../components/CardPost.vue';

    export default {
        name: 'CategoriesArchive',

        components: {
            LayoutDefault,
            PostCard,
        },

        data() {
            return {

                // Object category
                category: undefined,

                // array posts
                posts: [],
            }
        },

        methods: {

            // Funzione chiamata api recupero category posts
            recuperoCategoryPosts: function() {
                axios.get(`/api/categories/${this.$route.params.slug}/posts`)
                .then( res => {

                    // recupero category e posts
                    const {category, posts} = res.data;

                    // Assegno la variabile posts all'oggetto posts
                    this.posts = posts;

                    // Assegno la variabile category all'oggetto category
                    this.category = category;

                })
                .catch( err => {
                    console.warn(err);

                    // Redirect 404
                    this.$router.push('/404');
                })
            }
        },

        beforeMount() {

            // Richiamo funzione recupero category posts
            this.recuperoCategoryPosts();
        }
    }
</script>

<style lang="scss" scoped>

.category_archive {

    .card_post {
        box-shadow: 0px 8px 30px 4px rgba(0,0,0,0.84);
        -webkit-box-shadow: 0px 8px 30px 4px rgba(0,0,0,0.84);
        -moz-box-shadow: 0px 8px 30px 4px rgba(0,0,0,0.84);
    
        .img_wrapper_post {
    
            &:hover {
               
                img {
                    transform: scale(1.1);
                    opacity: 0.5;
                    transition: all 300ms linear;
                }
            }
        }
    }
}


</style>