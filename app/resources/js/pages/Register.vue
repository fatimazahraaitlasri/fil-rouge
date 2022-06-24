<template>
  <div>

    <form action="#" method="POST" class="form flex flex-col gap-3.5 ">
      <div>
        <label>Email address</label>
        <input type="email" name="email" v-model="email">
      </div>
      <div class="">
        <label for="floating_password" class="">Password</label>
        <input type="password" name="password" id="floating_password">
      </div>
      <div class="">

        <div class="">
          <label for="floating_last_name">name</label>
          <input type="text" name="name" id="floating_last_name" v-model="name">
        </div>
      </div>
      <div class="">
        <div class="">
          <label for="floating_phone">tel</label>
          <input type="tel" name="tel" id="floating_phone" v-model="tel">

        </div>


      </div>
      <div class="">
        <label for="floating_phone">Role</label>
        <input type="text" name="role" id="floating_phone" v-model="tel">

      </div>
      <button type="submit" v-on:click="Add()"
              class="text-white bg-rose-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Submit
      </button>
    </form>
  </div>
</template>

<script>

import axios from "axios";

export default {
  name: "Register",
  data() {
    return {
      name: "",
      email: "",
      tel: "",

    }
  },
  methods: {
    Add() {
      axios.post('register/create');


    }
  }
}
</script>

<style scoped lang="scss">
.form {
  align-items: center;
  width: 80%;
  height: 100vh;
  background-color: red;


  div {
    display: flex;
    flex-direction: column;
    align-items: center;


  }
}
</style>