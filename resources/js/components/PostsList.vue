<template>
    <div class="container">
        <h1 class="mt-4">Lista dei post | Totale: {{ totalPosts }}</h1>
        <div class="form-group">
            <label for="elements_in_page"> Elementi in pagina</label>
            <select @change="getPosts(1)"
                    class="form-select" 
                    id="elements_in_page"
                    v-model="elementsInPage"
                    >
                    <option value="4">4</option>
                    <option value="8">8</option>
                    <option value="12">12</option>
                    <option value="16">16</option>
            </select>
        </div>

        <!-- elementi inseriti dinamicamente -->
        <div class="row row-cols-4">
            <div class="col"
                v-for="post in posts"
                :key="post.id"            
            >
                <div class="card mt-2 mb-2">
                    <div class="card-body">
                        <h4 class="card-title">{{ post.title }}</h4>
                        <h6><strong>Categoria: {{ post.category ? post.category.name : "nessuna" }}</strong></h6>
                        <div class="card-text">
                            {{ ellipsis(post.content, 100) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- navigazione pagine -->
        <nav aria-label="...">
            <ul class="pagination">
                <!-- pagina precedente -->
                <li class="page-item" :class="{ disabled: currentPage === 1 }">
                    <a @click="getPosts(currentPage - 1)"
                        class="page-link"
                        href="#"
                        tabindex="-1"
                    >
                        &larr;
                    </a>
                </li>

                <!-- numero pagine -->
                <li class="page-item" 
                    v-for="n in lastPage" 
                    :key="n" 
                    :class="{ active: currentPage === n }">
                    <a @click="getPosts(n)" 
                        class="page-link" 
                        href="#"
                    >
                        {{ n }}
                    </a>
                </li>

                <!-- pagina successiva -->
                <li class="page-item" :class="{ disabled: currentPage === lastPage }">
                    <a @click="getPosts(currentPage + 1)" 
                        class="page-link" 
                        href="#"
                    >
                        &rarr;
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'PostsList',
    data() {
        return {
            posts: [],
            totalPosts: 0,
            elementsInPage: 4,
            currentPage: 1,
            lastPage: 1
        }
    },
    created() {
        this.getPosts(1);
    },
    methods: {
        getPosts(pageNumber) {
            axios.get("/api/posts", {
                params: {
                    page: pageNumber,
                    elements_in_page: this.elementsInPage
                },
            })
                .then((resp) => {
                    this.posts = resp.data.results.data;
                    this.totalPosts = resp.data.results.total;
                    this.currentPage = resp.data.results.current_page;
                    this.lastPage = resp.data.results.last_page;
                });
        },
        ellipsis(text, maxChar) {
            if (text.length > maxChar) {
                return text.substr(0, maxChar) + ' ...';
            }
            return text;
        }
    },
}
</script>

<style>
</style>
