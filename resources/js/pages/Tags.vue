<template>
  <div class="container">
    <h1 class="mt-4">Lista dei tags</h1>
    <TagsList />
  </div>
</template>

<script>
import TagsList from "../components/TagsList.vue";
export default {
  name: "Tags",
  components: {
    TagsList,
  },
};
</script>

<style>
</style>