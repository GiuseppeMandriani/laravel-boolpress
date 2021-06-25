/**
 * Fron-Office
 */

// require('./bootstrap');

window.Vue = require('vue');
// window.axios = require('axios');


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);




// INIT VUE MAIN ISTANCE

import App from './App.vue';
import router from './routes.js';

const root = new Vue({
    el: '#root',
    router: router,
    render: h => h(App) //Function con parametro hook
});
