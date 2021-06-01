<template>
  <section v-for="(item, key) in items" :id="id" :key="key" class="section">
    <h3 class="section__title">{{ item.title }}</h3>
    <p class="section__desc">{{ item.desc }}</p>
    <img class="section__img" :src="item.img" :alt="item.alt" />
  </section>
</template>

<script>
export default {
  name: "Section",
  props: {
    title: String,
    desc: String,
    img: String,
    alt: String,
    id: String,
    items: Array,
  },
};
</script>

<style lang="scss" scoped>
.section {
  background: var(--second-color);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 30px 0;

  &__title {
    font-size: 32px;
  }

  &__desc {
    max-width: 80vw;
    text-align: center;
    font-size: 20px;
  }

  &__img {
    width: 400px;
    height: 400px;
  }
}
</style>