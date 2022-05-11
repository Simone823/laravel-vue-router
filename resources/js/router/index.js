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
            title: 'BOOLPRESS | HOMEPAGE'
        }
    },

    {
        path: '/posts',
        name: 'posts.index',
        component: PostsIndex,
        meta: {
            title: 'BOOLPRESS | POSTS'
        }
    },

    {
        path: '/posts/:slug',
        name: 'posts.show',
        component: PostsShow,
        meta: {
            title: 'BOOLPRESS | LETTURA POST'
        }
    },

    {
        path: '/categories/:slug',
        name: 'categories.archive',
        component: CategoriesArchive,
        meta: {
            title: 'BOOLPRESS | CATEGORIA'
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