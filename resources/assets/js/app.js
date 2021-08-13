
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

Vue.component('category', require('./components/Category.vue'));

Vue.component('categories', require('./components/Categories.vue'));

Vue.component('tags', require('./components/Tags.vue'));

Vue.component('channels', require('./components/Channels.vue'));

Vue.component('coders', require('./components/Coders.vue'));
Vue.component('user-notifications',require('./components/UserNotifications.vue'));

Vue.component('search-play', require('./components/SearchPlay.vue'));

const app = new Vue({
    el: '#app'
});




 