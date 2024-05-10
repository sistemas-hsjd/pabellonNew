import './bootstrap';
import $ from 'jquery';

window.jQuery = $;
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createRouter, createWebHistory } from 'vue-router';
import Routes from './routes.js';
const app = createApp({});
const router = createRouter({
    routes:Routes,
    history: createWebHistory(),
});
app.use(router);
app.mount('#app');
