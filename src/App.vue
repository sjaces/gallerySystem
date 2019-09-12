<template lang="pug">
  section
    #app
      h1.py-4 {{ msg }}
      List(:list="orderedList" v-on:oneMore="oneMore")
</template>

<script>
import List from './components/list.vue'
// import "bootstrap/dist/css/bootstrap.min.css"
import "./assets/css/estiloscomunes.css"
import "./assets/css/personalizado.css"
import "./assets/animate-in.js"

// import 'bootstrap'
export default {
  name: 'app',
  components: { List },
  data () {
    return {
      msg: 'Hello',
      list: []
    }
  },
  computed: {
    orderedList () {
      return this.order(this.list)
    }
  },
  mounted () {
    fetch('./data/data.json').then(res => res.json())
    .then(json => {
      console.log(json)
      this.list = json.list})
  },
  methods: {
    order (list) {
      let orderedList = list.sort( function (a, b){
       if (a.rank > b.rank) {
    return 1;
  }
  if (a.rank < b.rank) {
    return -1;
  }
  return 0;
      })
      // console.log("ordenados", orderedList)
      return orderedList
    },
    oneMore (item) {
      // console.log("Recibido +1 ", item)
      // console.log("MI lista", this.list)
      let myItem = this.list.findIndex( function (el) {
        // console.log(item, el, el.title)
        return item === el.title
      } )
      // console.log("myItem", myItem)
      this.list[myItem].rank += 1
    }
  }
}
</script>

<style lang="scss">

</style>
