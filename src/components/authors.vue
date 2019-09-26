<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center firma">
        <template v-for="item in roles">
        <p class="authors">
          <strong>{{item}}: </strong>
          <span v-for="author in authorsOfRole(item)" class="coma" :key="author.name"> <a v-if="author.link" :href="author.link" target="_blank">{{ author.name }}</a> <template v-if="!author.link">{{author.name}}</template></span>
        </p>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    authors: {
      required: true
    }
  },
  computed:{
    roles() {
      let diferentRoles = []
      if(this.authors){
        this.authors.forEach(element => {
          diferentRoles.push(element.role)
        });
      }
      return [... new Set(diferentRoles)]
    }
  },
  methods: {
     authorsOfRole(role){
      if(this.authors){
        return this.authors.filter(e => e.role===role)
      }
     }
  }
};
</script>

<style>

 /* .coma:first-child::before {
  content: 's ';
} */

/* .coma:last-child::before {
  content: 'y ';
} */


.coma:last-child::after {
  content: '.';
}

.coma::before {
  content: '';
}
.coma::after {
  content: ', ';
}

.authors strong {
  text-transform: uppercase
}

</style>