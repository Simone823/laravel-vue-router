<template>

    <!-- Card -->
    <div class="card_post rounded-md overflow-hidden shadow-lg shadow-white/30">

        <!-- Img wrapper -->
        <figure class="img_wrapper_post w-full h-52 overflow-hidden cursor-pointer">
            <router-link :to="{name: 'posts.show', params: {slug: arrayPosts.slug}}">
                <img :src="arrayPosts.image" alt="" class="w-full object-cover hover:scale-110 hover:opacity-50 duration-500">
            </router-link>
        </figure>

        <!-- Description card -->
        <div class="description_post p-5">

            <!-- Title -->
            <router-link :to="{name: 'posts.show', params: {slug: arrayPosts.slug}}">
                <h3 class="title mb-5 text-xl max-w-max hover:text-color-yellow-green-1 transition-colors duration-300">
                    {{arrayPosts.title}}
                </h3>
            </router-link>

            <!-- Category -->
            <p v-if="arrayPosts.category" class="category rounded rounded-md bg-color-lime-1 shadow-md shadow-color-lime-1/50 text-black font-semibold max-w-max py-1 px-4 mb-5">
                {{arrayPosts.category.name}}
            </p>

            <!-- list Tags -->
            <ul class="list_tags flex gap-5 items-center flex-wrap">
                <li class="tag rounded rounded-lg bg-color-blue-1 text-black shadow-md shadow-color-blue-1/50 py-1 px-4 font-semibold flex items-center gap-1" v-for="tag in arrayPosts.tags" :key="tag.id">
                    <img :src="require('/public/img/tag_icon.svg')" class="h-4 w-4" alt="">
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

</style>