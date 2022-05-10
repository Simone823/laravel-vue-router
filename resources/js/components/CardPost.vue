<template>

    <!-- Card -->
    <div class="card_post rounded-md overflow-hidden">

        <!-- Img wrapper -->
        <figure class="img_wrapper_post w-full h-52">
            <img :src="arrayPosts.image" alt="" class="w-full object-cover">
        </figure>

        <!-- Description card -->
        <div class="description_post p-5">
            <h3 class="title mb-3 text-xl">{{arrayPosts.title}}</h3>
            <p v-if="arrayPosts.category" class="category mb-3 text-yellow-500 text-base font-semibold">{{arrayPosts.category.name}}</p>

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
}

</style>