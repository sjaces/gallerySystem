<template lang="pug">
  section
    #app
      Headers(:newspaper="newspaper" :cover="cover" :logos="newspaper.logos")
      Authors(:authors="newspaper.authors")
      List(:list="orderedList" v-on:oneMore="oneMore" :votes="newspaper.ordered")
      Recomendations(:teInteresa="teInteresa")
      Footer
      ShareButtons(:newspaper="newspaper")
</template>

<script>
import List from "./components/list.vue"
import Authors from "./components/authors.vue"
import Headers from './components/headers.vue'
import Recomendations from './components/recomendations.vue'
import Footer from './components/footer.vue'
import ShareButtons from './components/shareButtons.vue'

import "./assets/css/estiloscomunes.css"
import "./assets/css/personalizado.css"
import "./assets/js/animate-in.js"
import "./assets/js/vistasDs.js"


// import 'bootstrap'
export default {
  name: "app",
  components: { List, Authors, Headers, Recomendations, Footer, ShareButtons },
  data() {
    return {
      newspaper: {},
      list: [],
      teInteresa: [],
      cover: {},
      votes: []
    };
  },
  computed: {
    orderedList() {
      if(this.newspaper.ordered){
        return this.order(this.list)
      }else{
        return this.list
      }
    }
  },
 
  created() {
    // var referral = window.document.referrer
    // // console.log("referral", referral)
    // window.localStorage.setItem("referral", referral)
  },
  methods: {
    order(list) {
      let orderedList = list.sort(function(a, b) {
        if (a.votes > b.votes) {
          return -1;
        }
        if (a.votes < b.votes) {
          return +1;
        }
        return 0;
      });
      // console.log("ordenados", orderedList)
      return orderedList;
    },
    oneMore(item) {
      
      let myItem = this.list.findIndex(function(el) {
      
        return item === el.title;
      });

      
      this.list[myItem].votes += 1;
      
      fetch(this.newspaper.db_server + "db.php", {
          method: 'PUT',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({
            folder: this.newspaper.folder,
            item: this.list[myItem].img_file,
            votes: this.list[myItem].votes
          })
        })
       
    },
    
    //Method that cofigure main colors
    redefiningColors() {
      document.body.style.setProperty('--fondo', this.newspaper.backgroundColor)
        document.body.style.setProperty('--color', this.newspaper.color)
        document.body.style.setProperty('--colorDestacado', this.newspaper.mainColor)
        document.body.style.setProperty('--fondoBarra', this.newspaper.headerBackground)
        document.body.style.setProperty('--colorRedes', this.newspaper.sharer)
        document.body.style.setProperty('--colorSobre', this.newspaper.over)   
    },

    //Method that loads the ranking data from the external database through an API
    lookingForVotes () {

      //Builds the API URL
      let api = this.newspaper.db_server + "db.php?folder=" + this.newspaper.folder;

      // let api = this.newspaper.db_server + "api2.php/records/" + "posts" + "/";
      console.log("looking for votes in ", api)
      fetch(api)
      .then(res => res.json())
      .then(json => {
        console.log("votes", json.length )
        if(!json){
          console.log("voy a meter 0 votos a todos por error 9999 ")
                  this.list.map(item => {
                      item.votes = 0
                      // fetch(this.newspaper.db_server + "api2.php/records/mejorfoto", {
                      fetch(this.newspaper.db_server + "db.php", {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json', 'Access-Control-Allow-Origin': '*'},
                        body: JSON.stringify({
                          folder: this.newspaper.folder,
                          item: item.img_file,
                          votes: 0
                        })
                      })
                      .then(res => res.text()) // OR res.json()
                      .then(res => console.log(res))
                    })
          }
        if(json.length){
          this.votes = json;
          this.list.map(el => {
            let votesItem = this.votes.find(o => o.item === el.img_file)
            el.votes = votesItem.votes
            el.votesId = votesItem.id
            console.log("Votos de ", el.img_file, votesItem.votes)
            })
        }else{
              console.log("voy a meter 0 votos a todos pq no están en base de datos")
                  this.list.map(item => {
                      item.votes = 0
                      fetch(this.newspaper.db_server + "db.php", {
                        method: 'POST',
                       
                        body: JSON.stringify({
                          folder: this.newspaper.folder,
                          item: item.img_file,
                          votes: 0
                        })
                      })
                      .then(res => res.text()) // OR res.json()
                      .then(res => console.log(res))
                    })
          }
      }
       ).catch(e => {
        console.log( "error fetching votes: ", e)
      }
      )
      
    }
    
  },
  mounted() {

      //Load data from the data file and configuration
      fetch("./data/data.json") // <-- data file in json format
      .then(res => res.json())
      .then(json => {
        //pullate the data objects of the application
        //Data related to the publication
        this.newspaper = json.newspaper

        //Data related to de items of the publication
        this.list = json.list

        //Data about recommendation widget
        this.teInteresa = json.teInteresa

        //Data about cover, indeed it's not properly coded yet
        this.cover = json.cover

        //Method that cofigure main colors
        this.redefiningColors()

        //In case the gallery is a ranking, it look for the votes that must be in a Database, the method is lookingForVotes
        if(this.newspaper.ordered) this.lookingForVotes()
      });

  }
  
}
</script>

<style>

</style>
