<template>
    
    <!-- Layout default -->
    <LayoutDefault>

        <!-- Sezione tags archive -->
        <section class="tags_archive container py-8 px-4">

            <!-- Title -->
            <div class="section_title">
                <h2 class="uppercase text-lg font-bold tracking-wider mb-6 flex items-center justify-center gap-2">
                    <img :src="require('/public/img/tag_icon.svg')" class="h-5 w-5 invert" alt="">
                    Tag
                </h2>
            </div>

            <!-- Tag name -->
            <div class="tag_name text-center mb-16">
                <h1 v-if="tag" class="tag rounded rounded-lg bg-color-blue-1 text-black shadow-md shadow-color-blue-1/50 py-1 px-4 font-semibold mx-auto max-w-max flex items-center gap-1">
                    <img :src="require('/public/img/tag_icon.svg')" class="h-4 w-4" alt="">
                    {{tag.name}}
                </h1>
            </div>

            <!-- Grid container posts cards wrapper -->
            <div class="posts_cards_wrapper grid grid-cols-1 md:grid-cols-3 lg:grid:cols-4 sm:grid-cols-2 gap-16">
                
                <!-- Card -->
                <div v-for="element in posts" :key="element.id" class="card_post rounded-md overflow-hidden shadow-lg shadow-white/30">

                    <!-- Img wrapper -->
                    <figure class="img_wrapper_post w-full h-52 overflow-hidden cursor-pointer">
                        <router-link :to="{name: 'posts.show', params: {slug: element.slug} }">
                            <img :src="element.image" alt="" class="w-full object-cover hover:scale-110 hover:opacity-50 duration-500">
                        </router-link>
                    </figure>

                    <!-- Description card -->
                    <div class="description_post p-5">

                        <!-- Title -->
                        <router-link :to="{name: 'posts.show', params: {slug: element.slug} }">
                            <h3 class="title mb-5 text-xl max-w-max hover:text-color-yellow-green-1 transition-colors duration-300">{{element.title}}</h3>
                        </router-link>

                        <!-- Tags -->
                        <p v-if="tag" class="tag rounded rounded-lg max-w-max bg-color-blue-1 text-black shadow-md shadow-color-blue-1/50 py-1 px-4 font-semibold flex items-center gap-1">
                            <img :src="require('/public/img/tag_icon.svg')" class="h-4 w-4" alt="">
                            {{tag.name}}
                        </p>
                    </div>

                </div>
            </div>

        </section>

    </LayoutDefault>

</template>

<script>
// Import layout default
import LayoutDefault from '../layouts/layout.vue';

    export default {
        name: 'TagsArchive',

        components: {
            LayoutDefault,
        },

        data() {
            return {

                // Object tag
                tag: undefined,

                // Array posts
                posts: [],
            }
        },

        methods: {

            // Funzione chimata recupero tag posts
            recuperoTagPosts: function() {
                axios.get(`/api/tags/${this.$route.params.slug}/posts`)
                .then( res => {
                    
                    // Recupero il tag e i posts
                    const {tag, posts} = res.data;

                    // Assegno all'oggetto tag la costante tag
                    this.tag = tag;

                    // Pusho la costante posts nell'array posts
                    this.posts = posts;
                })
            }
        },

        beforeMount() {
          
            // Richiamo funzione recupero tag posts
            this.recuperoTagPosts();
        },
    }
</script>

<style lang="scss" scoped>

.tags_archive {

    .section_title {
        position: relative;

        &::after {
            content: '';
            display: block;
            position: absolute;
            left: 0;
            right: 0;
            top: 100%;
            transform: translateY(8px);
            background-color: #aaa;
            height: 1px;
            border-radius: 999px;
            opacity: 0.2;
        }
    }
}

</style>