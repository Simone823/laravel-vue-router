<template>

    <!-- Card -->
    <div class="card_post rounded-md overflow-hidden">

        <!-- Img wrapper -->
        <figure class="img_wrapper_post w-full h-52 overflow-hidden cursor-pointer">
            <router-link :to="{name: 'posts.show', params: {slug: arrayPosts.slug}}">
                <img :src="arrayPosts.image" alt="" class="w-full object-cover">
            </router-link>
        </figure>

        <!-- Description card -->
        <div class="description_post p-5">
            <router-link :to="{name: 'posts.show', params: {slug: arrayPosts.slug}}">
                <h3 class="title mb-5 text-xl max-w-max hover:text-cyan-300 transition-colors duration-300">{{arrayPosts.title}}</h3>
            </router-link>
            <p v-if="arrayPosts.category" class="category rounded rounded-md bg-lime-400 text-black font-semibold max-w-max py-1 px-4 mb-5">{{arrayPosts.category.name}}</p>

            <!-- list Tags -->
            <ul class="list_tags flex gap-5 items-center flex-wrap">
                <li class="tag rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 py-1 px-4 font-semibold" v-for="tag in arrayPosts.tags" :key="tag.id">
                    {{tag.name}}
                </li>
            </ul>
        </div>

    </div>

</template>

<script>
    export default {
        name : 'CardPost',

        props: {
            
            // Array posts
            arrayPosts: {
                type: Object,
                required: false
            },
        },
    }
</script>

<style lang="scss" scoped>

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

</style>