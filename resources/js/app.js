require('./bootstrap');

import Vue from 'vue'

Vue.component('example-component', require('./Components/ExampleComponent.vue').default);

 const app = new Vue({
   el: '#app',
 });