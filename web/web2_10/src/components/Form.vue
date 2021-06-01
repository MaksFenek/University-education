<template>
  <section class="form">
    <label for="title">Title</label>
    <input v-model="title" type="text" name="title" id="title" />
    <label for="desc">Description</label>
    <input v-model="desc" type="text" name="desc" id="desc" />
    <label for="img">Image url</label>
    <input v-model="img" type="text" name="img" id="img" />
    <label for="type">Category</label>
    <select v-model="type" name="type" id="type">
      <option value="html">HTML</option>
      <option value="css">CSS</option>
      <option value="js">JS</option>
    </select>
    <button @click="addItem">Add</button>
  </section>
</template>

<script>
export default {
  data() {
    return {
      title: "",
      desc: "",
      type: "",
      img: "",
    };
  },
  props: {
    add: Function,
  },
  methods: {
    addItem(e) {
      e.preventDefault();
      this.add(this.title, this.desc, this.type, this.img);
      (this.title = ""), (this.desc = "");
      this.img = "";
    },
  },
};
</script>

<style lang="scss" scoped>
.form {
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
}
</style>