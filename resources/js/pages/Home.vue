<template>
  <div>
    <img src="https://img.freepik.com/premium-photo/italian-pasta-ingredients-white-background-with-space-text_23-2147925938.jpg?w=2000" alt="cibo">
    <div class="title">Benvenuti su Boolpress!</div>
  </div>
</template>

<script>
export default {
    name: "Home"
}
</script>

<style lang="scss" scoped>
img {
  width: 100%;
  height: calc(100vh - 55px);
  object-fit: cover;
}
.title {
  position: absolute;
  top: 50%;
  left: 50%; 
  transform: translate(-50%, -50%);
  max-width: 40%;
  font-size: 4rem;
  text-align: center;
}
</style>