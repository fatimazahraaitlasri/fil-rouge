<template>
  <div>
    <Navigation v-if="!isHome"/>
    <router-view/>
    <div>footer</div>
  </div>
</template>

<script>

import Navigation from "./Navigation";

export default {
  name: "App",
  components: {Navigation},
  computed: {
    isHome() {
      return this.$route.fullPath === "/";
    }
  }
}
</script>

<style>


</style>