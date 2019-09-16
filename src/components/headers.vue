<template>
<div>
  <nav class="navbar navbar-expand-md fixed-top">
    <div class="container">
      <a class="navbar-brand" id="home" href=""
        ><img
          id="mancheta"
          :src="logo"
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
            {{ newspaper.titleH1 }}
          </h1>
          <!--La entradilla del especial -->
          <p class="subtitulo">
            {{ newspaper.subtitle }}
          </p>
          <!--El texto de presentación del especial -->
          <p class="colorBlanco">
            {{newspaper.description}}
          </p>
        </div>

      </div>
  </header>
       <div class="pt-3 firmaFoto">
        <span class="fa fa-camera-retro fa-lg"> </span> {{cover.photographer}}
      </div>

  <div class="postit paramovil">
    <div class="container">
      <div class="row ">
        <div class="pt-3 col-md-12 ">
          <!--El h1 del especial. Muy importante para SEO. Consultar con Fran-->
          <h1 class="ibm">
            {{ newspaper.titleH1 }}
          </h1>
          <!--La entradilla del especial -->
          <p class="subtitulo">
            {{ newspaper.subtitle }}
          </p>
          <!--La imagen de apertura del especial para móvil.La imagen que queremos que aparezca aquí debe llamarse "portada.jpg" y estar en la carpeta "imagenes"-->
          <img class="img-fluid" :src="cover.img_src" :alt="cover.alt" />
           <div class="firmaFoto">
            <span class="fa fa-camera-retro fa-lg"> </span> {{cover.photographer}}
          </div> 
          <!--El texto de presentación del especial -->
          <p>
            {{newspaper.description}}
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
import { nsend } from 'q'
// import VueRouter from 'vue-router'
var myCabeceras = require('../assets/js/cabeceras.min.js')
// import cabeceras from "../assets/js/cabeceras.min.js"

export default {
  props: {
    newspaper:{
      type: Object,
      required: true
    },
    cover:{
      type: Object,
      required: true
    }
  },
  computed: {
    logo() {
      if(this.newspaper){
        return `./data/imagenes/manchetas/${this.newspaper.logos}/${this.newspaper.cabecera}.png`
      }
      return ''
    }
  },
  methods: {
        checkNewspaper () {
            // console.log("Checking Newspaper")
            // console.log("Checking Newspaper", myCabeceras)
            // console.log("Checking Newspaper", this)
            cabeceras()
            // myCabeceras()
        }
    }
}
</script>

<style>

</style>