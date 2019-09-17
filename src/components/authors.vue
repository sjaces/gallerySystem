<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center firma">
        <p class="authors">
          <strong>DISEÑO Y PROGRAMACIÓN:</strong> 
          <span v-for="item in designers" class="coma" :key="item.name"> {{ item.name }}</span>
        </p>
        <p class="authors">
          <strong>REDACCIÓN y FOTOGRAFÍA:</strong>
          <span v-for="item in writers" class="coma" :key="item.name"> {{ item.name }}</span>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    authors: {
      type: Object,
      required: true
    }
  },
  computed:{
    designers() {
      if(this.authors){
        let designers = this.authors.filter(item => item.role === 'designer')
        return designers
      }
    },
    writers() {
      let writers = this.authors.filter(item => item.role === 'writer')
      return writers
    }
  }
};
</script>

<style>
.coma::after {
  content: ', ';
}

.coma:last-child::after {
  content: '.';
}
</style>