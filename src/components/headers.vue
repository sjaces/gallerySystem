<template>
<div>

  <nav class="navbar navbar-expand-md fixed-top">
    <div class="container">
      <a class="navbar-brand" id="home" href=""
        ><img
          id="mancheta"
          src="../../public/data/imagenes/manchetas/blanco/ds.png"
          alt=""
          class=""
          height="35"/><b> </b
      ></a>

      <div
        class="collapse navbar-collapse text-center justify-content-end"
        id="navbar2SupportedContent"
      >
        <ul class="navbar-nav"></ul>
      </div>
    </div>
  </nav>

  <!--Texto e imagen de apertura escritorio. La imagen que queremos que aparezca aquí debe llamarse "portada.jpg" y estar en la carpeta "imagenes"-->
  <header class="py-5 bg-image-full degradado desktop" id="imagenFondo">
      <div class="row align-items-end">
        <div class="col-md-10 col-center">
          <!--El h1 del especial. Muy importante para SEO. Consultar con Fran-->
          <h1 class="ibm colorBlanco">
            ##TITULO-H1##
          </h1>
          <!--La entradilla del especial -->
          <p class="subtitulo">
            Subtítulo del especial
          </p>
          <!--El texto de presentación del especial -->
          <p class="colorBlanco">
            Texto del especial
          </p>
        </div>

      </div>
  </header>
       <div class="pt-3 firmaFoto">
        <span class="fa fa-camera-retro fa-lg"> </span> Autor de la foto de portada
      </div>

  <div class="postit paramovil">
    <div class="container">
      <div class="row ">
        <div class="pt-3 col-md-12 ">
          <!--El h1 del especial. Muy importante para SEO. Consultar con Fran-->
          <h1 class="ibm">
            ##TITULO-H1##
          </h1>
          <!--La entradilla del especial -->
          <p class="subtitulo">
            Subtítulo del especial
          </p>
          <!--La imagen de apertura del especial para móvil.La imagen que queremos que aparezca aquí debe llamarse "portada.jpg" y estar en la carpeta "imagenes"-->
          <img class="img-fluid" src="../../public/data/imagenes/portada.jpg" alt="Descripción de la imagen" />
           <div class="firmaFoto">
            <span class="fa fa-camera-retro fa-lg"> </span> Autor de la imagen
          </div> 
          <!--El texto de presentación del especial -->
          <p>
            Texto del especial
          </p>
          <!-- Introducción -->
          <br />
        </div>
      </div>
    </div>
  </div>
   <img src="../../public/data/imagenes/pixel.png" alt="" @load="checkNewspaper()" />
</div>

</template>

<script>
import cabeceras from '../assets/js/cabeceras.min'
// import VueRouter from 'vue-router'
var myCabeceras = require('../assets/js/cabeceras.min.js')
// import cabeceras from "../assets/js/cabeceras.min.js"

export default {
  data () {
    return {

      // doc: this.$route.params.first
    }
  },
  methods: {
        checkNewspaper () {
            // console.log("Checking Newspaper")
            console.log("Checking Newspaper", myCabeceras)
            console.log("Checking Newspaper", this)
            cabeceras()
            // myCabeceras()
        }
    }
}
</script>

<style>

</style>