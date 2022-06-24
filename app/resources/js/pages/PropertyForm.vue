<template>
  <PropertyForm :handleSubmit="handleSubmit"/>
</template>

<script>
import PropertyForm from "../components/PropertyForm";

export default {
  components: {PropertyForm},
  methods: {
    async handleSubmit(data) {
      console.log(data);
      // const res = await axios.post(`${this.$API_URL}/properties/createProperty`);
      // this.$router.push("/properties");
    },
  }
}
</script>

<style scoped lang="scss">

</style>