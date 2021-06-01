<template>
  <div>
    <Header />
    <main>
      <h2>HTML technologies</h2>
      <Section id="html" :items="html" />
      <h2>CSS technologies</h2>
      <Section id="css" :items="css" />
      <h2>Js technologies</h2>
      <Section id="js" :items="js" />
    </main>
    <Form :add="addItem" />
    <Footer />
  </div>
</template>

<script>
import Header from "./components/Header";
import Footer from "./components/Footer";
import Section from "./components/Section";
import Form from "./components/Form";

export default {
  name: "App",
  data() {
    return {
      html: [
        {
          title: "HTML",
          desc:
            "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque rerum optio, rem cumque amet libero quos, accusamus suscipit voluptatibus vel ratione delectus pariatur inventore aliquid nemo perspiciatis placeat, necessitatibus voluptatem!",
          img:
            "https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/1200px-HTML5_logo_and_wordmark.svg.png",
        },
      ],
      css: [
        {
          title: "CSS",
          desc:
            "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque rerum optio, rem cumque amet libero quos, accusamus suscipit voluptatibus vel ratione delectus pariatur inventore aliquid nemo perspiciatis placeat, necessitatibus voluptatem!",
          img:
            "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/1200px-CSS3_logo_and_wordmark.svg.png",
        },
        {
          title: "SASS",
          desc:
            "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque rerum optio, rem cumque amet libero quos, accusamus suscipit voluptatibus vel ratione delectus pariatur inventore aliquid nemo perspiciatis placeat, necessitatibus voluptatem!",
          img:
            "https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Sass_Logo_Color.svg/1200px-Sass_Logo_Color.svg.png",
        },
      ],
      js: [
        {
          title: "JS",
          desc:
            "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque rerum optio, rem cumque amet libero quos, accusamus suscipit voluptatibus vel ratione delectus pariatur inventore aliquid nemo perspiciatis placeat, necessitatibus voluptatem!",
          img:
            "https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/1200px-Unofficial_JavaScript_logo_2.svg.png",
        },
        {
          title: "Vue",
          desc:
            "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque rerum optio, rem cumque amet libero quos, accusamus suscipit voluptatibus vel ratione delectus pariatur inventore aliquid nemo perspiciatis placeat, necessitatibus voluptatem!",
          img:
            "https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/1200px-Vue.js_Logo_2.svg.png",
        },
      ],
    };
  },
  methods: {
    addItem(title, desc, type, img) {
      this[type].push({ title, desc, img });
    },
  },
  components: {
    Header,
    Footer,
    Section,
    Form,
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap");

:root {
  --main-color: #fcbf49;
  --second-color: #eae2b7;
}

#app {
  font-family: "Roboto", sans-serif;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  scroll-behavior: smooth;
}

a {
  color: #000;
  text-decoration: none;
}

h2 {
  text-align: center;
}

main {
  background: var(--second-color);
}
</style>
