<template>
  <div class="form">
    <form @submit.prevent="handleSubmit">
      <label class="field">
        <span class="label">name</span>
        <input placeholder="name" type="text" v-model="data.name">
      </label>
      <label class="field">
        <span class="label">address</span>
        <input type="text" placeholder="address" v-model="data.address">
      </label>
      <label class="field">
        <span class="label">city</span>
        <input type="text" v-model="data.city" placeholder="city">
      </label>
      <label class="field">
        <span class="label">country</span>
        <input type="text" v-model="data.country" placeholder="country">

      </label>
      <label class="field">
        <span class="label">price</span>
        <input type="number" v-model="data.price" placeholder="price">
      </label>
      <label class="field">
        <span class="label">image</span>
        <input type="text" v-model="data.image" placeholder="preview link">
      </label>
      <label class="field">
        <span class="label">description</span>
        <textarea v-model="data.description" placeholder="description"></textarea>
      </label>
      <button class="submit">submit</button>
    </form>
  </div>
</template>

<script>


export default {
  name: "PropertyForm",
  props: ["values", "handleSubmit"],
  data() {
    return {
      data: {
        name: "",
        price: 0,
        description: "",
        address: "",
        type: "hotel",
        image: "",
        city: "",
        country: "",
        ...this.values,
      }
    }

  },
  methods: {
    submit() {
      console.log(this.data);
      this.handleSubmit(this.data);
    }
  }
}
</script>

<style scoped lang="scss">
@import "~@/abstracts";

.form {
  margin: 3rem 0;
  padding: 2rem;

  form {
    display: flex;
    gap: 1rem;
    flex-direction: column;

    .field {
      display: flex;
      flex-direction: column;
      gap: 1rem;

      .label {
        font-weight: bold;
        font-size: 1.4rem;
        text-transform: capitalize;
      }

      input, textarea {
        padding: 1rem;
        border-radius: .5rem;
        border: 1px solid $border-color;

        &:focus {
          outline: none;
        }
      }
    }

    button {
      padding: 1rem;
      border-radius: .5rem;
      border: none;
      background-color: $primary-color;
      color: white;
      font-weight: 600;
      margin-top: 2rem;
      text-transform: capitalize;
      cursor: pointer;
    }
  }
}

</style>