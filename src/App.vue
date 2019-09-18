<template lang="pug">
  section
    #app
      Headers(:newspaper="newspaper" :cover="cover" :logos="newspaper.logos")
      Authors(:authors="newspaper.authors")
      List(:list="orderedList" v-on:oneMore="oneMore" :votes="newspaper.ordered")
      Recomendations(:teInteresa="teInteresa")
      Footer
      ShareButtons(:newspaper="newspaper")
</template>

<script>
import List from "./components/list.vue"
import Authors from "./components/authors.vue"
import Headers from './components/headers.vue'
import Recomendations from './components/recomendations.vue'
import Footer from './components/footer.vue'
import ShareButtons from './components/shareButtons.vue'
// import "bootstrap/dist/css/bootstrap.min.css"

// import $ from "jquery";
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
      list: [],
      teInteresa: [],
      cover: {}
    };
  },
  computed: {
    orderedList() {
      if(this.newspaper.ordered){
        // console.log("Fotos ordenadas")
        return this.order(this.list)
      }else{
        // console.log("Fotos desordenadas")
        return this.list
      }
    }
  },
  created() {
    // var referral = window.document.referrer
    // // console.log("referral", referral)
    // window.localStorage.setItem("referral", referral)
  },
  mounted() {
    
      fetch("./data/data.json")
      .then(res => res.json())
      .then(json => {
        this.list = json.list
        this.newspaper = json.newspaper
        this.teInteresa = json.teInteresa
        this.cover = json.cover
        this.redefiningColors()
        // console.log(this.newspaper.logos)
      });
  },
  methods: {
    order(list) {
      let orderedList = list.sort(function(a, b) {
        if (a.votes > b.votes) {
          return 1;
        }
        if (a.votes < b.votes) {
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
      this.list[myItem].votes += 1;
    },
    redefiningColors() {
      document.body.style.setProperty('--fondo', this.newspaper.backgroundColor)
        document.body.style.setProperty('--color', this.newspaper.color)
        document.body.style.setProperty('--colorDestacado', this.newspaper.mainColor)
        document.body.style.setProperty('--fondoBarra', this.newspaper.headerBackground)
        document.body.style.setProperty('--colorRedes', this.newspaper.sharer)
        document.body.style.setProperty('--colorSobre', this.newspaper.over)
        
        // console.log("newspaper", this.newspaper)
        // console.log("colores", this.newspaper.backgroundColor, this.newspaper.color, this.newspaper.mainColor)
    }
    
  }
}
</script>

<style>

</style>
