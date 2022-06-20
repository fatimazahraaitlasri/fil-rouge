<template>
  <div class="card">
    <div class="img"><img :src="data.image" :alt="data.name"></div>
    <div class="info">
      <p class="name">{{ data.name }}</p>

    </div>
  </div>
</template>

<script>
export default {
  name: "Card",
  props: ["data"]
}
</script>

<style scoped>

</style>