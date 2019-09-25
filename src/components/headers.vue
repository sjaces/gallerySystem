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
  <header class="py-5 bg-image-full degradado desktop" id="imagenFondo" :style="putBackground" >
      <div class="row align-items-end">
        <div class="col-md-10 col-center">
          <!--El h1 del especial. Muy importante para SEO. Consultar con Fran-->
          <h1 class="ibm colorBlanco" v-html="newspaper.titleH1">
          </h1>
          <!--La entradilla del especial -->
          <p class="subtitulo colorBlanco" v-html="newspaper.subtitle">
          </p>
          <!--El texto de presentación del especial -->
          <p class="colorBlanco" v-html="newspaper.description">
          </p>
        </div>

      </div>
  </header>
       <div class="firmaFoto">
        <span class="fa fa-camera-retro fa-lg"> </span> {{cover.photographer}}&nbsp;&nbsp;
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
          <img class="img-fluid firma" :src="portada" :alt="cover.alt" />
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
   <img src="../../public/data/manchetas/pixel.png" alt="" @load="checkNewspaper()" />
</div>

</template>

<script>
import cabeceras from '../assets/js/cabeceras.min'

export default {
  props: {
    newspaper:{
      type: Object,
      required: true
    },
    cover:{
      type: Object,
      required: true
    },
    logos:{
    }
  },
  computed: {
    logo() {
      if(this.newspaper){
        return `./data/manchetas/${this.newspaper.logos}/${this.newspaper.cabecera}.png`
      }
      return ''
    },
     putBackground(){
      let styles = ` background-size: cover; background: -moz-linear-gradient(top, rgba(0, 0, 0, .9) 0, rgba(0, 0, 0, 0) 55%, rgba(0, 0, 0, 0) 100%), url('./data/imagenes/${this.cover.img_file}') no-repeat cover; background: -webkit-linear-gradient(top, rgba(0, 0, 0, .9) 0, rgba(0, 0, 0, 0) 55%, rgba(0, 0, 0, 0) 100%), url('./data/imagenes/${this.cover.img_file}') no-repeat cover; background: linear-gradient(to bottom, rgba(0, 0, 0, .9) 0, rgba(0, 0, 0, 0) 55%, rgba(0, 0, 0, 0) 100%), url('./data/imagenes/${this.cover.img_file}') no-repeat cover; background-position: top; background-attachment: scroll; margin-top: 70px; min-height: 700px; min-width: 100%;   `
    return styles
    },
    portada(){
      console.log("portada", this.cover.img_file)
      return `./data/imagenes/${this.cover.img_file}`
    }
  },
  updated(){
    this.checkNewspaper()
  },
  methods: {
        checkNewspaper () {
            if(this.newspaper.logos){
              cabeceras(this.logos)
        }
    }
}
}
</script>

<style>

</style>