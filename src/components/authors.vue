<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center firma">
        <template v-for="item in roles">
        <p class="authors" v-bind:key="item">
          <strong>{{item}}: </strong>
          <span v-for="(author, index) in authorsOfRole(item)" class="coma" :key="author.name" :index="index" :total="authorsOfRole(item).length">
             <template v-if="(index+1) === (authorsOfRole(item).length) && authorsOfRole(item).length!=1"> y </template> 
             <template v-else-if="authorsOfRole(item).length!=1 && index != 0">, </template>
             <a v-if="author.link" :href="author.link" target="_blank">{{ author.name }}</a> <template v-if="!author.link">{{author.name}}</template></span>
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

/* .coma::before {
  content: '';
}
.coma::after {
  content: ', ';
} */

.authors strong {
  text-transform: uppercase
}

</style>