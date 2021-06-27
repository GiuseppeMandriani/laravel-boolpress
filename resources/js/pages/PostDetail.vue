<template>
    <div class="container">
        <div v-if="post">
            <h1>{{ post.title }}</h1>

            <div class="post-info">
                <div class="content">
                    <p>{{ post.content }}</p>
                </div>
                <div>
                    <span v-if="post.category">{{ post.category.name }}</span>
                    <span v-else>Nessuna Categoria</span>
                </div>

                <span
                    v-for="tag in post.tags"
                    :key="`tag-${tag.id}`"
                    class="tag"
                >
                    {{ tag.name }}
                </span>
            </div>
        </div>

        <div v-else>
            Loading..
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "PostDetail",
    data() {
        return {
            post: null
        };
    },
    created() {
        this.getPostDetails();
    },
    methods: {
        getPostDetails() {
            console.log("API CALL");

            axios
                .get(
                    `http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`
                )
                .then(res => {
                    console.log(res.data);
                    this.post = res.data;
                })
                .catch(err => {
                    console.log("Error", err);
                });
        }
    }
};
</script>

<style lang="scss" scoped>
.tag {
    display: inline-block;
    margin: 0.25rem;
    padding: 0.35rem;
    font-size: 0.75rem;
    color: #fff;
    background-color: dodgerblue;
    border-radius: 10px;
}
</style>
