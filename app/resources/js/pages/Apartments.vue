<template>
  <div class="hotels">
    <div class="entities">
      <h2>Apartments</h2>
      <p class="text">Donec vitae dignissim magna, viverra semper justo. Cras blandit enim blandit porta elementum.</p>
      <div class="list">
        <CardItem v-for="apartment in apartments" :key="apartment.id" :data="apartment"/>
      </div>
    </div>
  </div>
</template>

<script>
import Navigation from "../components/Navigation";
import CardItem from "../components/CardItem";

export default {
  name: "Hotels",
  components: {CardItem, Navigation},
  data() {
    return {
      apartments: Array(9).fill({
        country: "spain",
        city: "barcelona",
        price: 200.90,
        image: "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=780&q=80",
        name: "my home"
      }).map((v, i) => ({...v, id: i}))

    }
  }
}
</script>

<style scoped lang="scss">
@import "~@/abstracts";

.entities {
  margin: 2rem 0;
  padding: 1rem 2rem;
  display: flex;
  flex-direction: column;
  gap: 1rem;
  @include desktop {
    margin: 3rem 0;
    padding: 1.5rem 3rem;
  }

  h2 {
    font-size: 3rem;
    font-weight: bold;
  }

  .text {
    margin-bottom: 1rem;
    @include desktop {
      margin-bottom: 2rem;
    }
  }

  .list {
    display: grid;
    gap: 3rem;
    @include desktop {
      grid-template-columns: repeat(3, 1fr);
    }
  }
}
</style>