// Dipendenze
import Vue from 'vue';
import VueRouter from 'vue-router';

// Componenti per le pagine 
import Home from './pages/Home.vue';

// Referenza router con vue
Vue.use(VueRouter);

// Definizione rotte app

const router = new VueRouter({
    mode: 'history',
    routes: [{
        path: '/',
        name: 'home',
        component: Home,
    }]
});

export default router;
