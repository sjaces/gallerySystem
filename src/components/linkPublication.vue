<template>
  <div class="LinkPublicacion">
  <hr style="width:15%" color="black">
    <a :href="linkPublicacion.url" target="blank">
      {{ linkPublicacion.title }}
    </a>
  </div>
</template>

<script>
export default {
  props: {
    linkPublicacion: {
      type: Object,
      required: true
    }
  }
}
</script>

<style>
  
</style>