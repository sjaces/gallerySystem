<template>
      <section id="botonera" class="">
   <!--Botones sociales: cambiamos los valores del nombre de la carpeta del especial y el título del mismo-->
        <div class="boton">
          <a
            href="http://www.facebook.com/share.php?u=https://##WEB-DOMINIO-DIARIO##/temas/##CARPETA-ESPECIAL##/index.php&title=##TITULO-H1##"
            target="blank"
            onclick="javascript:window.open(this.href,
      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
          >
            <i class="fa fa-fw fa-facebook fa-2x"></i>
          </a>
        </div>
        <div class="boton">
          <a
            href="https://twitter.com/share?url=https://##WEB-DOMINIO-DIARIO##/temas/##CARPETA-ESPECIAL##/index.php&text=##TITULO-H1##. Vía @usuario-twitter"
            target="blank"
            onclick="javascript:window.open(this.href,
      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
          >
            <i class="fa fa-fw fa-twitter fa-2x"></i>
          </a>
        </div>
        <div class="boton paramovil">
          <a
            href="whatsapp://send?text=##TITULO-H1##. https://##WEB-DOMINIO-DIARIO##/temas/##CARPETA-ESPECIAL##/index.php"
            data-text="##TITULO-H1##"
            data-href="https://##WEB-DOMINIO-DIARIO##/temas/##CARPETA-ESPECIAL##/index.php"
            class="wa_btn wa_btn_s"
          >
            <i class="fa fa-fw fa-whatsapp fa-2x"></i>
          </a>
        </div>
      </section>
  
</template>

<script>
export default {

}
</script>

<style>

</style>