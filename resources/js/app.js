/**
 * Fron-Office
 */

// require('./bootstrap');

window.Vue = require('vue');
// window.axios = require('axios');


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);




// INIT VUE MAIN ISTANCE

import App from './App.vue';

const root = new Vue({
    el: '#root',
    render: h => h(App) //Function con parametro hook
});
