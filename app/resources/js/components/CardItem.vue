<template>
  <div class="card">
    <router-link :to="`/apartments/${data.id}`" class="img"><img :src="data.image" :alt="data.name"></router-link>
    <div class="main">
      <router-link class="name" :to="`/apartments/${data.id}`">{{ data.name }}</router-link>
      <div class="info">
        <span class="price">{{ data.price }}$</span>
        <span class="location">{{ data.city }}, {{ data.country }}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CardItem",
  props: ["data"]
}
</script>

<style scoped lang="scss">
@import "~@/abstracts";

.card {
  display: flex;
  flex-direction: column;
  gap: 1rem;

  .img {
    height: 20rem;
    border-radius: .5rem;
    transition: all .2s ease;

    &:hover {
      opacity: .5;
    }

    @include desktop {
      height: 25rem;
    }

    img {
      border-radius: inherit;
      @include size(100%);
      object-fit: cover;
    }
  }

  .main {
    display: flex;
    flex-direction: column;
    gap: 1rem;

    .name {
      text-transform: capitalize;
      font-weight: bold;

      &:hover {
        opacity: .5;
      }
    }

    .info {
      border-top: 1px solid rgba($border-color, .2);
      padding: 1rem 0;
      display: flex;
      gap: 1rem;
      text-transform: capitalize;

      .price {
        color: $primary-color;
        font-weight: 500;
      }

      .location {
        opacity: .5;
      }
    }
  }

}

</style>