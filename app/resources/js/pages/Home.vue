<template>
  <div class="home">
    <div class="intro">
      <Navigation :light="true"/>
      <form class="filter" @submit.prevent="handleSubmit">
        <h1 class="header">Discover new amazing places around you</h1>
        <p class="text">
          Donec vitae dignissim magna, viverra semper justo. Cras blandit enim blandit porta
          elementum.
        </p>
        <div class="fields">
          <input v-model="filter.location" class="city" type="text"
                 placeholder="Search any address, zip code or city...">
          <input type="date" v-model="filter.date" class="date">
          <input type="number" class="guests" v-model="filter.guestsCount" placeholder="select guests">
          <button class="submit"><i class="far fa-search"></i></button>
        </div>
      </form>
    </div>
    <div class="rents">
      <h2>Apartments in Marrakech</h2>
      <p class="text">bla bla bla</p>
      <div class="list">
        <Card v-for="apartment in apartments" :key="apartment.id" :data="apartment"/>
      </div>
    </div>
  </div>
</template>

<script>
import Navigation from "../components/Navigation";

export default {
  name: "Home",
  components: {Navigation},
  data() {
    return {
      filter: {
        location: "",
        date: undefined,
        guestsCount: 0,
      },
      apartments: Array(6).fill({
        country: "spain",
        city: "barcelona",
        price: 200.90,
        image: "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=780&q=80",
        name: "my home"
      }).map((v, i) => ({...v, id: i}))
    }
  },

  methods: {
    handleSubmit() {
      console.log(this.filter)
    }
  }
}
</script>

<style lang="scss">
@import "~@/abstracts";

.intro {
  background: url("img/IMAGE.png") no-repeat center;
  background-size: cover;
  padding-bottom: 2rem;
  display: flex;
  flex-direction: column;
  gap: 2rem;

  .filter {
    background-color: white;
    text-align: center;
    width: 90%;
    border-radius: .5rem;
    padding: 1rem;
    margin: 3rem auto;
    @include desktop {
      margin: 5rem 0;
      margin-left: 5rem;
      width: 40%;
      padding: 3rem 5rem;
    }

    .header {
      font-weight: bold;
      text-transform: capitalize;

      font-size: 3rem;
    }

    .text {
      font-size: 1.4rem;
    }

    .fields {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      row-gap: 1rem;
      @include desktop {
        row-gap: 2rem;
      }

      input {
        border-bottom: 1px solid rgba($border-color, .5);
        padding: 1rem;
        width: 100%;
        transition: all .2s ease;

        &:focus {
          outline: none;
          border-color: $border-color;
        }
      }

      .city {
        grid-column: 1 / -1;
      }


    }

    .submit {
      text-align: center;
      background-color: $primary-color;
      display: flex;
      padding: 1rem;
      color: white;
      justify-content: center;
      margin: 0 1rem;
      margin-top: 2rem;

      align-items: center;
      border-radius: 1rem;
      text-transform: capitalize;
      font-weight: bold;
      grid-column: 1 / -1;
      @include desktop {
        padding: 1.5rem;
      }
    }
  }
}

</style>




