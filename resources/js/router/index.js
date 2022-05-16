// Import vue 
import Vue from "vue";

// Import vue router
import VueRouter from "vue-router";

// Import homepage
import Homepage from '../pages/Homepage.vue';

// Import posts index
import PostsIndex from '../pages/Posts.index.vue';

// Import posts show
import PostsShow from '../pages/Posts.show.vue';

// Import categories archive
import CategoriesArchive from '../pages/Categories.archive.vue';

// Import tags archive vue
import TagsArchive from '../pages/Tags.archive.vue';

// Import pages 404 not found
import NotFoundPage from '../pages/404.vue';

// Vue use vue router
Vue.use(VueRouter);

// Array rotte
const routes = [
    {
        path: '/',
        name: 'homepage',
        component: Homepage,
        meta: {
            title: 'BOOLPRESSBLOG | HOMEPAGE'
        }
    },

    {
        path: '/posts',
        name: 'posts.index',
        component: PostsIndex,
        meta: {
            title: 'BOOLPRESSBLOG | POSTS'
        }
    },

    {
        path: '/posts/:slug',
        name: 'posts.show',
        component: PostsShow,
        meta: {
            title: 'BOOLPRESSBLOG | LETTURA POST'
        }
    },

    {
        path: '/categories/:slug',
        name: 'categories.archive',
        component: CategoriesArchive,
        meta: {
            title: 'BOOLPRESSBLOG | CATEGORIA'
        }
    },

    {
        path: '/tags/:slug',
        name: 'tags.archive',
        component: TagsArchive,
        meta: {
            title: 'BOOLPRESSBLOG | TAG'
        }
    },

    {
        path: '/*',
        name: '404',
        component: NotFoundPage,
        meta: {
            title: '404 | PAGE NOT FOUND'
        }
    }
];

// Creo una nuova istanza di vue router
const router = new VueRouter({
    mode: 'history',
    routes,
});


// Imposto il meta title sulle rotte
router.beforeEach( (toRoute, fromRoute, next) => {
    window.document.title = toRoute.meta.title;

    next();
});

// Export default istance router
export default router;