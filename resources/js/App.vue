<template>
    <div>
        <Header />

        <main>
            <div class="container">
                <h1>Blog</h1>

                <article v-for="post in posts" :key="post.id">
                    <h2>{{ post.title }}</h2>

                    <h2>{{ post.pubblication_date }}</h2>

                    <a href="">Read More</a>
                </article>
            </div>
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
    },
    data() {
        return {
            posts: []
        };
    },
    created() {
        console.log(axios);
        this.getPosts();
    },
    methods: {
        /**
         * Get Post from Api
         */
        getPosts() {
            axios
                .get("http://127.0.0.1:8000/api/posts")
                .then(res => {
                    console.log(res.data);
                    this.posts = res.data;
                })
                .catch(err => {
                    console.log(err, "Error");
                });
        }
    }
};
</script>

<style lang="scss">
@import "../sass/frontoffice/_utilities.scss";

body {
    font-family: sans-serif;
}
</style>
