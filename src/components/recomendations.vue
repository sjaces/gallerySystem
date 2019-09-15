<template>
  <div class="container">
        <div class="row">
          <div class="col-12 text-center pt-5">
            <p>
              <em>También te puede interesar:</em><br> 
              <template v-for="item of teInteresa">
                <LinkPublicacion :linkPublicacion="item" :key="item.title"></LinkPublicacion>
              </template>
              
            </p>
          </div>
        </div>
    </div>

</template>

<script>
import LinkPublicacion from './linkPublication.vue'
export default {
  props: {
    teInteresa: {
      type: Array,
      required: true
    }
  },
  components: { LinkPublicacion }
}
</script>

<style>

</style>