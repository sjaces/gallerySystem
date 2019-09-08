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

// import 'bootstrap'
export default {
  name: 'app',
  components: { List },
  data () {
    return {
      msg: 'Hello',
      list: [
      {
        title: 'Tercero',
        img_src: 'https://www.diariodesevilla.es/temas/todos-conciertos-sevilla-otono-programacion/imagenes/1%20DAVID%20BUSTAMANTE%20(Juan%20Carlos%20V%C3%A1zquez).jpg',
        photographer: 'Juan carlos Vazquez',
        text: 'Acaba de publicar su trabajo Héroes y es uno de los rostros populares del talent show La Voz. Inmerso en una gira promocional por toda España, ahora David Bustamante aterriza en Sevilla para ofrecer un concierto en el espacio Cartuja Center el 13 de septiembre. El cántabro vuelve a las tablas tras un breve descanso para interpretar temas nuevos, como Héroes en tiempos de guerra, o clásicos como No soy un supermnán.',
        rank: 10
      },
      {
        title: 'Primero',
        img_src: 'https://www.diariodesevilla.es/temas/todos-conciertos-sevilla-otono-programacion/imagenes/1%20DAVID%20BUSTAMANTE%20(Juan%20Carlos%20V%C3%A1zquez).jpg',
        photographer: 'Juan carlos Vazquez',
        text: 'Acaba de publicar su trabajo Héroes y es uno de los rostros populares del talent show La Voz. Inmerso en una gira promocional por toda España, ahora David Bustamante aterriza en Sevilla para ofrecer un concierto en el espacio Cartuja Center el 13 de septiembre. El cántabro vuelve a las tablas tras un breve descanso para interpretar temas nuevos, como Héroes en tiempos de guerra, o clásicos como No soy un supermnán.',
        rank: 20
      },
      {
        title: 'segundo',
        img_src: 'https://www.diariodesevilla.es/temas/todos-conciertos-sevilla-otono-programacion/imagenes/1%20DAVID%20BUSTAMANTE%20(Juan%20Carlos%20V%C3%A1zquez).jpg',
        photographer: 'Juan carlos Vazquez',
        text: 'Acaba de publicar su trabajo Héroes y es uno de los rostros populares del talent show La Voz. Inmerso en una gira promocional por toda España, ahora David Bustamante aterriza en Sevilla para ofrecer un concierto en el espacio Cartuja Center el 13 de septiembre. El cántabro vuelve a las tablas tras un breve descanso para interpretar temas nuevos, como Héroes en tiempos de guerra, o clásicos como No soy un supermnán.',
        rank: 7
      }
      ]
    }
  },
  computed: {
    orderedList () {
      return this.order(this.list)
    }
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
