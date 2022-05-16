<template>

    <!-- extend layout.vue -->
    <LayoutDefault>
        <!-- Post card -->
        <div v-if="post" class="card_post p-4">

            <!-- Img wrapper -->
            <figure class="img_wrapper_post w-full mb-3 shadow-lg shadow-white/30">
                <img :src="post.image" alt="" class="w-full object-cover object-center">
            </figure>

            <!-- Description card -->
            <div class="description_post py-8 px-5 container">
                <h3 class="title mb-8 text-3xl max-w-max">{{post.title}}</h3>
                <p v-if="post.category" class="category rounded rounded-md bg-color-lime-1 shadow-md shadow-color-lime-1/50 text-black font-semibold max-w-max py-1 px-4 mb-8">{{post.category.name}}</p>

                <!-- list Tags -->
                <ul v-if="post.tags" class="list_tags flex gap-5 items-center flex-wrap mb-8">
                    <li class="tag rounded rounded-lg bg-color-blue-1 text-black shadow-md shadow-color-blue-1/50 py-1 px-4 font-semibold flex items-center gap-1" v-for="tag in post.tags" :key="tag.id">
                        <img :src="require('/public/img/tag_icon.svg')" class="h-4 w-4" alt="">
                        {{tag.name}}
                    </li>
                </ul>

                <!-- Desscription -->
                <p v-if="post.description" class="description text-gray-300 leading-loose">{{post.description}}</p>
            </div>
        </div>
    </LayoutDefault>

</template>

<script>
// Import layout default
import LayoutDefault from '../layouts/layout.vue';

    export default {
        name: 'PostsShow',

        components: {
            LayoutDefault,
        },

        data() {
            return {
                // Object post
                post: [],
            }
        },

        methods: {

            // Chiamata axios recupero post
            getPost: function() {
                axios.get(`/api/posts/${this.$route.params.slug}`)
                .then( res => {
                    
                    // Recupero il post
                    const {post} = res.data;

                    // Assegno il varole delle constante post al mio oggetto post
                    this.post = post;
                })
                .catch( err => {
                    console.warn(err);

                    // redirect page not found
                    this.$router.push('/404');
                })
            }
        },

        beforeMount() {

            // Richiamo la funzione getPost
            this.getPost();
        }
    }
</script>

<style lang="scss" scoped>

.card_post {
    .img_wrapper_post {
        height: 720px;
    }
}

</style>