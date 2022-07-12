<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-info mt-3 mb-3">
                    INFO <hr>
                    Il sito aprirà a breve! se sei un content creator, aggiungi <strong>/admin</strong> alla barra degli indirizzi ed entra con le tue credenziali.
                </div>
            </div>
        </div>
        <h1>Front Office | Lista dei post</h1>
        <div class="row row-cols-4">
            <div class="col"
                v-for="post in posts"
                :key="post.id"            
            >
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">{{ post.title }}</h4>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PostsList',
    data() {
        return {
            posts: []
        }
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            axios.get("/api/posts")
                .then((resp) => {
                    this.posts = resp.data.results
                })
        }
    },
}
</script>

<style>
</style>
