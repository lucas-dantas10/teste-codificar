import { createRouter, createWebHistory } from 'vue-router';
import Login from '../views/Login/Login.vue';
import Register from '../views/Register/Register.vue';
import Posts from '../views/Posts/Posts.vue';

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
        component: Posts
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;