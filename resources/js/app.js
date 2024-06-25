import './bootstrap';
// import 'toastr/build/toastr.min.css';
import  VueSelect from "vue-select";
import { createApp } from 'vue/dist/vue.esm-bundler.js';
// import toastr from 'toastr'
import { createRouter, createWebHistory } from 'vue-router';
import Routes from './routes.js';
const app = createApp({});
const router = createRouter({
    routes:Routes,
    history: createWebHistory(),
});
// app.config.globalProperties.$toastr = toastr
app.component("v-select", VueSelect)
app.use(router);
app.config.warnHandler = function (msg, vm, trace) {
    // No hacer nada o manejar la advertencia según sea necesario
 };
app.mount('#app');
