/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

Vue.component('v-select', vSelect);

// Toaster Notifications
import Toasted from 'vue-toasted';
Vue.use(Toasted)

import StarRating from 'vue-star-rating';
Vue.component('star-rating', StarRating);


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/** PLUGINS  **/
Vue.component('pagination', require('laravel-vue-pagination'));


/** Static Pages **/
Vue.component('about', require('./pages/about.vue').default);
Vue.component('contact', require('./pages/contact.vue').default);
Vue.component('homepage', require('./pages/homepage.vue').default);
Vue.component('wineclub', require('./pages/wineclub.vue').default);


/** Model Pages **/

// Event Pages
Vue.component('event-index', require('./pages/event/index.vue').default);

// Product Pages
Vue.component('product-index', require('./pages/product/index.vue').default);
Vue.component('product-show', require('./pages/product/show.vue').default);

// User Pages
Vue.component('user-account', require('./pages/user/account.vue').default);

// Page components
Vue.component('discover-card', require('./components/discoverCard.vue').default);
Vue.component('event-card', require('./components/eventCard.vue').default);

Vue.component('account', require('./pages/account.vue').default);






/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


$( "#scroll-gif" ).hover(
    function() {
        $( this ).animate( { width: '+=20px' }, 200 ).css('cursor', 'pointer');
    },
    function() {
        $( this ).animate( { width: '-=20px' }, 250 );
    }
);

$( ".discover-card-conatiner .card" ).hover(
    function() {
        $( this ).css('cursor', 'pointer');
    },
);

$(".explore-button").click(function() {
    $('html, body').animate({
        scrollTop: $("section").offset().top
    }, 1000);
});
