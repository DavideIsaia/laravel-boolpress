<template>
  <div class="container">
    <section v-if="tag">    
      <h1 class="mt-4">Tag: {{ tag.name }}</h1>
      <h4>Post con questo tag:</h4>
      <div class="row row-cols-4">
        <div v-for="post in tag.posts"
              :key="post.id"
              class="col"
            >
            <PostCard :post="post" />
        </div>
      </div>
    </section> 
    <section v-else><h2>Caricamento...</h2></section> 
  </div>
</template>

<script>
import PostCard from "../components/PostCard.vue";
export default {
  name: "SingleTag",
  components: {
    PostCard
  },
  data() {
    return {
      tag: null,
    }
  },
  created() {
    this.getDetails();
  },
  methods: {
    getDetails() {
      const slug = this.$route.params.slug;
      axios
        .get(`/api/tags/${slug}`) //ricordare di mettere backtick
        .then((resp) => {
          if (resp.data.success) {
            this.tag = resp.data.results;
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