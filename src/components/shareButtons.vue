<template>
      <section id="botonera" class="">
   <!--Botones sociales: cambiamos los valores del nombre de la carpeta del especial y el título del mismo-->
        <div class="boton">
          <a
            :href="facebook"
            target="blank"
            onclick="javascript:window.open(this.href,
      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
          >
            <i class="fa fa-fw fa-facebook fa-2x"></i>
          </a>
        </div>
        <div class="boton">
          <a
            :href="twitter"
            target="blank"
            onclick="javascript:window.open(this.href,
      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
          >
            <i class="fa fa-fw fa-twitter fa-2x"></i>
          </a>
        </div>
        <div class="boton paramovil">
          <a
            :href="whatsapp"
            :data-text="newspaper.titleH1"
            :data-href="newspaper.URL"
            class="wa_btn wa_btn_s"
          >
            <i class="fa fa-fw fa-whatsapp fa-2x"></i>
          </a>
        </div>
      </section>
  
</template>

<script>
export default {
  props: {
    newspaper:{
      type: Object,
      required: true
    }
  },
    computed: {
      facebook() {
        if(this.newspaper){

          const facebookURL = `http://www.facebook.com/share.php?u=${this.newspaper.URL}&title=${this.newspaper.titleH1}`
        return facebookURL
        }
      },
      twitter() {
        const twitterURL = `https://twitter.com/share?url=${this.newspaper.URL}&text=${this.newspaper.titleH1}. Vía @${this.newspaper.twitterSite}`
        return twitterURL
      },
      whatsapp(){
        const whatsappCode = `whatsapp://send?text=${this.newspaper.titleH1}. ${this.newspaper.URL}`
        return whatsappCode
      }
    },
  }
</script>

<style>

</style>