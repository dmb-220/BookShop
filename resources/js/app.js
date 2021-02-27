require('./bootstrap');

import Vue from 'vue'

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.component('reviews-ratings', require('./Components/ReviewsRatings.vue').default);

 const app = new Vue({
   el: '#app',
 });