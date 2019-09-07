<template lang="pug">
  section
    #app
      h1.py-4 {{ msg }}
      List(:list="list")
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
        title: 'David Bustamante',
        img_src: 'https://www.diariodesevilla.es/temas/todos-conciertos-sevilla-otono-programacion/imagenes/1%20DAVID%20BUSTAMANTE%20(Juan%20Carlos%20V%C3%A1zquez).jpg',
        photographer: 'Juan carlos Vazquez',
        text: 'Acaba de publicar su trabajo Héroes y es uno de los rostros populares del talent show La Voz. Inmerso en una gira promocional por toda España, ahora David Bustamante aterriza en Sevilla para ofrecer un concierto en el espacio Cartuja Center el 13 de septiembre. El cántabro vuelve a las tablas tras un breve descanso para interpretar temas nuevos, como Héroes en tiempos de guerra, o clásicos como No soy un supermnán.'
      },
      {
        title: 'David Bustamante',
        img_src: 'https://www.diariodesevilla.es/temas/todos-conciertos-sevilla-otono-programacion/imagenes/1%20DAVID%20BUSTAMANTE%20(Juan%20Carlos%20V%C3%A1zquez).jpg',
        photographer: 'Juan carlos Vazquez',
        text: 'Acaba de publicar su trabajo Héroes y es uno de los rostros populares del talent show La Voz. Inmerso en una gira promocional por toda España, ahora David Bustamante aterriza en Sevilla para ofrecer un concierto en el espacio Cartuja Center el 13 de septiembre. El cántabro vuelve a las tablas tras un breve descanso para interpretar temas nuevos, como Héroes en tiempos de guerra, o clásicos como No soy un supermnán.'
      }
      ]
    }
  }
}
</script>

<style lang="scss">

</style>
