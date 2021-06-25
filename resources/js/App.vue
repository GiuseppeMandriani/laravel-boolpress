<template>
    <div>
        <Header />

        <main>
            <!-- Componente routes -->
            <router-view></router-view>
        </main>

        <footer>
            FOOTER HERE
        </footer>
    </div>
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
