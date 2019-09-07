<template lang="pug">
  section.container
    .row#app
      .col-12
        h1.py-4 {{ msg }}
        List(:list="list")
</template>

<script>
import List from './components/list.vue'
import "bootstrap/dist/css/bootstrap.min.css"
// import 'bootstrap'
export default {
  name: 'app',
  components: { List },
  data () {
    return {
      msg: 'Hello',
      list: [1,2,3,4]
    }
  }
}
</script>

<style lang="scss">

</style>
