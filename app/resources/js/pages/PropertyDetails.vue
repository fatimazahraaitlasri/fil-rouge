<template>
  <div class="details">
    <div class="intro">
      <div class="main">
        <h2 class="name">{{ details.name }}</h2>
        <p class="address">{{ details.address }}, {{ details.city }} - {{ details.country }}</p>
      </div>
      <p class="price">${{ details.price }}/night</p>
    </div>
    <div class="img">
      <img :src="details.image" :alt="details.name">
    </div>
    <div class="description">
      <p class="title">description</p>
      <p class="text">{{ details.description }}</p>
    </div>
  </div>
</template>

<script>

export default {
  name: "PropertyDetails",
  data() {
    return {
      details: {
        country: "spain",
        city: "Barcelona",
        address: "JL. Camplung Tanduk N 10",
        price: 465,
        type: "hotel",
        image: "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=780&q=80",
        description: "something about this hotel",
        name: "hotel indigo Bali Seminyak Beach"
      }
    }
  },
  mounted() {
    this.getApartmentDetails();
  },
  methods: {
    async getApartmentDetails() {
      const {property} = this.$route.params;
      //  get details from backend properties/get/{id}
    }
  }
}
</script>

<style scoped lang="scss">
@import "~@/abstracts";

.details {
  display: flex;
  flex-direction: column;
  padding: 1rem 2rem;
  margin: 2rem 0;
  @include desktop {
    width: 60%;
    margin: 4rem auto;
  }

  .intro {

    @include desktop {
      display: flex;
      flex-direction: row;
      align-items: center;
      padding: 2rem;
    }

    .main {
      display: flex;
      flex-direction: column;
      gap: 1rem;

      .name {
        font-weight: bold;
        text-transform: capitalize;
        font-size: 1.8rem;
      }

      .address {
        font-size: 1.4rem;
        opacity: .5;
      }
    }

    .price {
      color: $primary-color;
      font-size: 1.8rem;
      text-transform: capitalize;
      margin-left: auto;
      font-weight: 600;
    }
  }

  .img {
    border-radius: .5rem;
    transition: all .2s ease;
    
    img {
      @include size(100%);
      border-radius: inherit;
      object-fit: cover;
    }
  }

  .description {
    margin-top: 2rem;
    border-top: 2px solid black;
    padding-top: 1rem;

    .title {
      text-transform: capitalize;
      font-weight: bold;
    }

    .text {

    }
  }
}
</style>