<template>
  <div class="container">
    <section v-if="post">    
      <h1 class="mt-4">{{ post.title }}</h1>
      <h6><strong>Categoria: {{ category }}</strong></h6>
      <ul>
        <li>
          <router-link
            :to="{ name: 'single-tag', params: {slug: tag.slug } }" 
            v-for="tag in post.tags"
            :key="tag.id"
            class="badge rounded-pill bg-success mr-2 d-inline-block"
          >
            {{ tag.name }}
          </router-link>
        </li>
      </ul>
      <p class="mt-2">{{ post.content }}</p>  
    </section> 
    <section v-else><h2>Caricamento...</h2></section> 
  </div>
</template>

<script>
export default {
  name: "SinglePost",
  data() {
    return {
      post: null,
    }
  },
  created() {
    this.getDetails();
  },
  computed: {
    category() {
      return this.post.category ? this.post.category.name : "nessuna";
    }
  },
  methods: {
    getDetails() {
      const slug = this.$route.params.slug;
      axios
        .get(`/api/posts/${slug}`) //ricordare di mettere backtick
        .then((resp) => {
          if (resp.data.success) {
            this.post = resp.data.results;
          } else {
            this.$router.push({ name: "not-found" });
          }          
        })
    }
  }
}
</script>

<style>
</style>