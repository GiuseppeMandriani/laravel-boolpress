<template>
    <v-app>
        <Header />

        <main>
            <!-- Componente routes -->
            <router-view></router-view>
        </main>

        <footer>
            FOOTER HERE
        </footer>
    </v-app>
</template>

<script>
import Header from "./components/Header.vue";
import axios from "axios";
export default {
    name: "App",
    components: {
        Header
    }
};
</script>

<style lang="scss">
@import "~vuetify/dist/vuetify.min.css";
@import "../sass/frontoffice/_utilities.scss";

body {
    font-family: sans-serif;
}

.navigation {
    .active-page {
        background: dodgerblue;
    }
}
</style>
