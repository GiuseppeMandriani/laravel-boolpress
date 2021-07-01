/**
 * Front-Office
 */

// require('./bootstrap');

window.Vue = require('vue');

// Importazione Vuetify
import Vuetify from 'vuetify';

// import vuetify from 'vuetify/lib';

// window.axios = require('axios');

// Registrazione Vuetify
Vue.use(Vuetify);
const vuetify = new Vuetify();


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);




// INIT VUE MAIN ISTANCE

import App from './App.vue';
import router from './routes.js';

const root = new Vue({
    el: '#root',
    router: router,
    vuetify: vuetify,
    render: h => h(App) //Function con parametro hook
});
