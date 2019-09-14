<template lang="pug">
  section
    #app
      Headers
      Authors
      List(:list="orderedList" v-on:oneMore="oneMore")
      Recomendations
      Footer
      ShareButtons
</template>

<script>
import List from "./components/list.vue"
import Authors from "./components/authors.vue"
import Headers from './components/headers.vue'
import Recomendations from './components/recomendations.vue'
import Footer from './components/footer.vue'
import ShareButtons from './components/shareButtons.vue'
// import "bootstrap/dist/css/bootstrap.min.css"

import $ from "jquery";
import "./assets/css/estiloscomunes.css";
import "./assets/css/personalizado.css";
import "./assets/js/animate-in.js";
import "./assets/js/vistasDs.js";

// import 'bootstrap'
export default {
  name: "app",
  components: { List, Authors, Headers, Recomendations, Footer, ShareButtons },
  data() {
    return {
      newspaper: {},
      list: []
    };
  },
  computed: {
    orderedList() {
      return this.order(this.list);
    }
  },
  mounted() {
    fetch("./data/data.json")
      .then(res => res.json())
      .then(json => {
        this.list = json.list
        this.newspaper = json.newspaper
      });
  },
  methods: {
    order(list) {
      let orderedList = list.sort(function(a, b) {
        if (a.rank > b.rank) {
          return 1;
        }
        if (a.rank < b.rank) {
          return -1;
        }
        return 0;
      });
      // console.log("ordenados", orderedList)
      return orderedList;
    },
    oneMore(item) {
      // console.log("Recibido +1 ", item)
      // console.log("MI lista", this.list)
      let myItem = this.list.findIndex(function(el) {
        // console.log(item, el, el.title)
        return item === el.title;
      });
      // console.log("myItem", myItem)
      this.list[myItem].rank += 1;
    }
  }
};
</script>

<style lang="scss">
</style>
