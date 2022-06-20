<template>
  <h1>hello in login page</h1>
  <div class="form flex justify-center align-center  ">
    <form action="" method="post" class=" main flex flex-col justify-center  ">
      <label>your mail:</label>
      <input type="email" placeholder="type your email">
      <label>your password:</label>
      <input type="password">
    </form>
  </div>
</template>

<!-- v-model-->
<script>
export default {
  name: "Login"
}
</script>

<style scoped lang="scss">
.form {
  height: 100vh;
  width: 90vw;
  margin: auto;
  gap: 100px;

  .main {
    align-items: center;
    width: 70%;
    border-radius: 10px;
    border: solid 1px gainsboro;

    input {
      width: 70%;
      height: 50px;
      border: solid 1px gainsboro;
      border-radius: 9px;
      background-color: gainsboro;
    }
  }

}

</style>