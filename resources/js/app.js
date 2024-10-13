/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue'; // Import App.vue
const app = createApp(App);
import router from './router';


app.use(router)
app.mount('#app');
