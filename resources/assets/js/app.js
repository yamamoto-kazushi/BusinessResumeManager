
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import router from './router'
Vue.component('vue-component', require('./components/pages/Index.vue'));
Vue.component('vue-header', require('./components/atoms/Header.vue'));
Vue.component('vue-footer', require('./components/atoms/Footer.vue'));

const app = new Vue({
    router,
    // render: h => h(app),
    el: '#app'
});
