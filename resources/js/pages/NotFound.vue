<template>
  <div>
    <h1>Errore 404 | Pagina non trovata</h1>
    <router-link class="back" :to="{name: 'home'}">Torna alla Home</router-link>
  </div>
</template>

<script>
export default {
  name: "NotFound"
}
</script>

<style lang="scss" scoped>
.back {
  position: absolute;
  top: 65%;
  left: 50%; 
  transform: translate(-50%, -50%);
  font-size: 2rem;
}

h1 {
  position: absolute;
  top: 50%;
  left: 50%; 
  transform: translate(-50%, -50%);
  font-size: 4rem;
}
</style>
