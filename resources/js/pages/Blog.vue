<template>
    <div class="container">
        <h1>Blog Page</h1>

        <h3>Blog List</h3>

        <article v-for="post in posts" :key="post.id">
            <h2>{{ post.title }}</h2>

            <h2>{{ post.pubblication_date }}</h2>

            <a href="">Read More</a>
        </article>

        <div class="navigation">
            <button
                v-show="pagination.current > 1"
                @click="getPosts(pagination.current - 1)"
            >
                Prev
            </button>

            <button
                v-for="i in pagination.last"
                :key="`page-${i}`"
                @click="getPosts(i)"
                :class="{ 'active-page': i == pagination.current }"
            >
                {{ i }}
            </button>
            <button
                v-show="pagination.current < pagination.last"
                @click="getPosts(pagination.current + 1)"
            >
                Next
            </button>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "Blog",
    data() {
        return {
            posts: [],
            pagination: {}
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
        getPosts(page = 1) {
            axios
                .get(`http://127.0.0.1:8000/api/posts?page=${page}`)
                .then(res => {
                    console.log(res.data);
                    this.posts = res.data.data; //Pagination aggungo .data
                    this.pagination = {
                        current: res.data.current_page,
                        last: res.data.last_page
                    };
                })
                .catch(err => {
                    console.log(err, "Error");
                });
        }
    }
};
</script>

<style lang="scss" scoped></style>
