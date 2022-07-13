<template>
  <div>
    <img src="https://img.freepik.com/premium-photo/italian-pasta-ingredients-white-background-with-space-text_23-2147925938.jpg?w=2000" alt="cibo">
    <div class="title">
      <div class="alert alert-info mt-3 mb-5">
          Benvenuti su Boolpress! <hr>
          Se sei un content creator, aggiungi <strong>/admin</strong> alla barra degli indirizzi ed entra con le tue credenziali.
      </div>
    </div>
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
  max-width: 30%;
  font-size: 1.8rem;
}
</style>