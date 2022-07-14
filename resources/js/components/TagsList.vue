<template>
  <div class="container">
    <ul>
      <li v-for="tag in tags" :key="tag.id">
        <router-link :to="{ name: 'single-tag', params: { slug: tag.slug } }">
          <h4>{{ tag.name }}</h4>
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "TagsList",
  data() {
    return {
      tags: [],
    };
  },
  mounted() {
    this.getTags();
  },
  methods: {
    getTags() {
      axios
        .get("/api/tags")
        .then((resp) => {
          this.tags = resp.data.results;
      });
    },
  },
};
</script>

<style>
</style>