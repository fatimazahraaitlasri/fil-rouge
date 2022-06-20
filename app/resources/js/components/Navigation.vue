<template>
  <div class="nav">
    <router-link to="/">Bbrikk</router-link>
    <div class="links">
      <router-link to="/hotels">hotels</router-link>
      <router-link to="/apartements">apartements</router-link>
    </div>
    <div class="auth">
      <router-link to="/login">
        <i class="fas fa-user"></i>
        <span class="text">sign in</span>
      </router-link>
      <router-link to="/create">host your place</router-link>
    </div>
  </div>
</template>
<script>
export default {
  name: "Navigation"
}
</script>

<style scoped lang="scss">

</style>