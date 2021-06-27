<template>
    <div class="container">
        <div v-if="post">
            <h1>{{ post.title }}</h1>

            <div class="post-info">
                <div class="content">
                    <p>{{ post.content }}</p>
                </div>
                <div class="category">
                    <span v-if="post.category">{{ post.category.name }}</span>
                    <span v-else>Nessuna Categoria</span>
                </div>

                <!-- <span
                    v-for="tag in post.tags"
                    :key="`tag-${tag.id}`"
                    class="tag"
                >
                    {{ tag.name }}
                </span> -->

                <Tags :tags="post.tags" />
            </div>
        </div>

        <Loader v-else />
    </div>
</template>

<script>
import axios from "axios";
import Tags from "../components/Tags.vue";
import Loader from "../components/Loader.vue";
export default {
    name: "PostDetail",
    components: {
        Loader,
        Tags
    },
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
.category {
    display: inline-block;
}
</style>
