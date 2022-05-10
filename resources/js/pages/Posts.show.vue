<template>

    <!-- Post card -->
    <div v-if="post" class="card_post p-4">

        <!-- Img wrapper -->
        <figure class="img_wrapper_post w-full mb-3 shadow-2xl">
            <img :src="post.image" alt="" class="w-full object-cover object-center">
        </figure>

        <!-- Description card -->
        <div class="description_post py-8 px-5 container">
            <h3 class="title mb-5 text-2xl">{{post.title}}</h3>
            <p v-if="post.category" class="category mb-5 text-yellow-500 text-base font-semibold">{{post.category.name}}</p>

            <!-- list Tags -->
            <ul class="list_tags flex gap-5 items-center flex-wrap mb-8">
                <li class="tag rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 py-1 px-4 font-semibold" v-for="tag in post.tags" :key="tag.id">
                    {{tag.name}}
                </li>
            </ul>

            <!-- Desscription -->
            <p class="description text-gray-300 leading-loose">{{post.description}}</p>
        </div>
    </div>

</template>

<script>
    export default {
        name: 'PostsShow',

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
        height: 480px;
    }
}

</style>