<template>
  <div>
    <Navigation/>
    <router-view/>
    <div>footer</div>
  </div>
</template>

<script>

import Navigation from "./Navigation";

export default {
  name: "App",
  components: {Navigation},
}
</script>

<style>

.main {
  background-color: purple;
}

</style>