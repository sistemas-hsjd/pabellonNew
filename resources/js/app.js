import './bootstrap';
import  VueSelect from "vue-select";
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createRouter, createWebHistory } from 'vue-router';
import Routes from './routes.js';
const app = createApp({});
const router = createRouter({
    routes:Routes,
    history: createWebHistory(),
});
app.component("v-select", VueSelect)
app.use(router);

app.mount('#app');
