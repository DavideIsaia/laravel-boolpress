<template>
  <div class="card mt-2 mb-2">
    <img v-if="post.thumb" class="card-img-top" :src="post.thumb" alt=""/>
    <div class="card-body">
      <h4 class="card-title">{{ post.title }}</h4>
      <h6><strong>Categoria: {{ category }}</strong></h6>
      <div class="card-text">{{ ellipsis(100) }}</div>
      <router-link :to="{ name: 'single-post', params: {slug: post.slug} }" class="card-link">Leggi tutto</router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: {
    post: Object
  },
  computed: {
    category() {
      return this.post.category ? this.post.category.name : "nessuna";
    }
  },
  methods: {
    ellipsis(maxChar) {
      if (this.post.content.length > maxChar) {
        return this.post.content.substr(0, maxChar) + ' ...';
      }
      return this.post.content;
    }
  }
}
</script>

<style>

</style>