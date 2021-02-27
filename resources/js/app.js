require('./bootstrap');

import Vue from 'vue'

import VueSweetalert2 from 'vue-sweetalert2';
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.component('reviews-ratings', require('./Components/ReviewsRatings.vue').default);

 const app = new Vue({
   el: '#app',
 });