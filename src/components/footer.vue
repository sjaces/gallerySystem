<template charset="utf-8">
  <div class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-12 my-3 text-center">
              <a
                id="subir"
                href="#"
                alt="Grupo Joly"
                onclick="onLinkClick('home')"
              >
                <img
                  class="logofooter"
                  src="../../public/data/manchetas/color/gj.png"
                  alt="Grupo Joly"
                  width="300px"
                />
              </a>
              <br />
              <p>Joly Digital | <a :href="lopd" target="_blank" title="Enlace footer" class="aforce">Política de privacidad</a> | <a :href="cookies" target="_blank" title="Enlace footer" class="aforce">Política de cookies</a> | <a href="javascript:Didomi.preferences.show('purposes');" title="Enlace footer" class="aforce">Configuración de cookies</a></p>
              <br />
              <p class="text-muted">© Copyright {{new Date().getFullYear()}} Grupo Joly</p>
            </div>
          </div>
        </div>
      </div>
</template>

<script>
export default {props: {
    newspaper:{
      type: Object,
      required: true
    }
  },
  computed: {
    lopd() {
      if(this.newspaper){
        return `https://www.${this.newspaper.domain}/lopd`;
      }
      return ''
    },
    cookies() {
      if(this.newspaper){
        return `https://www.${this.newspaper.domain}/cookies/`;
      }
      return ''
    }
  }
}
</script>

<style>

</style>