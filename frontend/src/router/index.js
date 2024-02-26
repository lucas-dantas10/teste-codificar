import { createRouter, createWebHistory } from 'vue-router';
import Login from '../views/Login/Login.vue';
import Register from '../views/Register/Register.vue';
import Posts from '../views/Posts/Posts.vue';
import PostCreate from '../views/Posts/Create/PostCreate.vue';
import store from '../store';

const routes = [
    {
        name: 'login',
        path: '/',
        component: Login
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'posts',
        path: '/posts',
        component: Posts,
        meta: {
            requiresAuth: true
        },
    },
    {
        name: 'create.post',
        path: '/create/post',
        component: PostCreate,
        meta: {
            requiresAuth: true
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({name: 'login'});
    } else if (to.meta.requiresGuest && store.state.user.token) {
        next({name: 'posts'});
    } else {
        next();
    }
});

export default router;