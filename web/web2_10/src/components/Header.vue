<template>
  <header class="header">
    <picture>
      <source
        class="header__logo"
        media="(max-width: 980px)"
        srcset="../assets/logo-sm.png"
      />
      <source
        class="header__logo"
        media="(max-width: 1480px)"
        srcset="../assets/logo-mid.png"
      />
      <img class="header__logo" src="../assets/logo-big.png" alt="logo" />
    </picture>
    <nav class="header__nav">
      <ul class="header__list">
        <li><a href="#html">HTML</a></li>
        <li><a href="#css">CSS</a></li>
        <li><a href="#js">JS</a></li>
      </ul>
    </nav>
    <label for="theme"
      >Dark theme <input type="checkbox" name="theme" id="theme"
    /></label>
  </header>
</template>

<script>
export default {
  name: "Header",
};
</script>

<style lang="scss" scoped>
.header {
  max-width: 100vw;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: var(--main-color);

  &__nav {
    display: flex;
    align-items: center;
  }

  &__logo {
    width: 48px;
    height: 48px;
  }

  &__list {
    display: flex;
    align-items: center;
    list-style: none;

    li {
      padding: 0 10px;
      a {
        transition: 0.3s ease-in;
        &:hover {
          color: var(--second-color);
        }
      }
    }
  }
}
</style>