<template>
  <div class="nav">
    <router-link to="/" class="logo">Bbrikk</router-link>
    <div class="links">
      <router-link to="/hotels">hotels</router-link>
      <router-link to="/apartements">apartements</router-link>
    </div>
    <div class="auth">
      <router-link to="/login" class="login">
        <i class="fas fa-user"></i>
        <span class="text">sign in</span>
      </router-link>
      <router-link to="/create" class="create">host <span>your place</span></router-link>
    </div>
  </div>
</template>
<script>
export default {
  name: "Navigation"
}
</script>

<style scoped lang="scss">
@import "~@/abstracts";

.nav {
  padding: 1rem;
  display: flex;
  align-items: center;
  @include desktop {
    padding: 1rem 5rem;
  }

  .logo {
    font-size: 2rem;
    font-weight: bold;
    text-shadow: 0 .2rem .5rem rgba(black, .2);
    @include desktop {
      font-size: 4rem;
    }
  }

  .links {
    display: none;
    gap: 2rem;
    margin-left: 10rem;
    font-weight: 600;
    text-transform: capitalize;
    @include desktop {
      display: flex;
    }
  }

  .auth {
    display: flex;
    gap: 1rem;
    margin-left: auto;

    .login {
      display: flex;
      gap: 1rem;
      align-items: center;

      .text {
        text-transform: capitalize;

        display: none;
        @include desktop {
          display: inline-block;
        }
      }
    }

    .create {
      background-color: $primary-color;
      color: white;
      font-weight: 600;
      padding: .5rem 1rem;
      border-radius: .5rem;
      text-transform: capitalize;
      transition: all .2s ease;

      &:hover {
        background-color: $primary-highlight-color;
      }

      @include desktop {
        font-size: 1.4rem;
        padding: 1rem;
        border-radius: 1.5rem;
      }

      span {
        display: none;
        @include desktop {
          display: inline-block;
        }
      }
    }
  }
}
</style>