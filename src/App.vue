/* eslint-disable no-irregular-whitespace */
<template lang="pug">
  section
    #app
      Headers(:newspaper="newspaper" :cover="cover" :logos="newspaper.logos")
      Authors(:authors="newspaper.authors")
      List(:list="orderedList" v-on:oneMore="oneMore" :voted="voted" :closedVoting="closedVoting" :numbers="newspaper.numbers" :alignment="newspaper.alignment")
      Recomendations(:teInteresa="teInteresa" v-if="showTeInteresa")
      Footer(:newspaper="newspaper")
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
      votes: [],
      voted: false
    };
  },
  computed: {
    orderedList() {
      if(this.newspaper.ordered){
        return this.order(this.list)
      }else{
        return this.list
      }
    },
    closedVoting() {
      return (this.newspaper.closedVoting) ? this.newspaper.closedVoting : false
    },
    showTeInteresa() {
      return (this.teInteresa.length > 0 ) ?  true :  false
    }
  },
 
  created() {
    //Here I make things before mounting the app component
  },
  mounted() {
      let hash = new Date().getTime()
      //Load data from the data file and configuration
      fetch("./data/data.json?hash="+hash) // <-- data file in json format
      .then(res => res.json())
      .then(json => {
        //pullate the data objects of the application
        //Data related to the publication
        this.newspaper = json.newspaper
        // console.log("closed", this.newspaper.closedVoting)
       if(!this.newspaper.ordered ||  window.localStorage.getItem(`voted-${this.newspaper.folder}`)){
          let today = new Date()
          today = this.getDateFormated(today)
          let votedDate
          if(window.localStorage.getItem(`votedDate-${this.newspaper.folder}`)) votedDate =  window.localStorage.getItem(`votedDate-${this.newspaper.folder}`);
          // console.log (today, votedDate)
          if(today === votedDate) this.voted = true
          // console.log (today, votedDate)
         }
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

  },
  methods: {
    order(list) {   //Just return the list of items ordered by votes
      let orderedList = list.sort(function(a, b) {
        if (parseInt(a.votes) > parseInt(b.votes)) {
          return -1;
        }
        if (parseInt(a.votes) < parseInt(b.votes)) {
          return +1;
        }
        return 0;
      });
      return orderedList;
    },
    oneMore(item) {   // This method add 1 vote to the item desired and send the new value to the DB

      //Before starting the voting process I see if this user has just voted before
      if(this.voted) return

      // First I need to locate my item in the internal list
      let myItem = this.list.findIndex(function(el) {
        return item === el.title;
      });

        // console.log("item ", item, myItem)
      // Build the URL to make the query to de DB
      let urlAPI = this.newspaper.db_server + "db.php?id="+this.list[myItem].votesId;

        // console.log("item tiene votos:  ", this.list[myItem].votesId)

      // I send the AJAX request to see the actual number the votes
      fetch(urlAPI, {
          method: 'GET'
        })
        .then(res => res.json())
        .then(res => {
          // console.log("respuest dice que tiene votos: ", res[0].votes)
          
          //Then I add a vote to the real number of votes
          // this.list[myItem].votes = parseInt(res[0].votes) + 1;
          let newVote = parseInt(res[0].votes) + 1;
          // console.log("Id: ",this.list[myItem].votesId, this.list[myItem].votes);

            this.voted = true
            window.localStorage.setItem(`voted-${this.newspaper.folder}`, true)
            window.localStorage.setItem(`votedDate-${this.newspaper.folder}`, this.getDateFormated(Date()))
            // console.log(this)

          // Then I send the AJAX request to add the vote
          fetch(urlAPI, {
              method: 'POST',
              body: JSON.stringify({
                votes: newVote
                // votes: parseInt(this.list[myItem].votes)
              })
            })
            .then(res => res.text())
            .then(() => {
              // console.log(res)
            
                        // this.list[myItem].votes = newVote;
                        

              // console.log("reiniciando");
              let myVotes = this.list;
        
              // console.log(myVotes);
              this.list = [];
              setTimeout(() => {
                this.list = myVotes;
                          this.list[myItem].votes = newVote;
                          const item = this.list[myItem].title;
                          // console.log(item)
      
                          this.lookForY(item);
      
      
                // this.lookingForVotes();
       
              }, 100);
            });
        });
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
    lookForY(item){
      setTimeout(() => {
        
        const myItem = document.getElementById(item);
        const Y = myItem.offsetParent.offsetTop;
        // console.log('Y', Y);
         window.scrollTo({top: Y, behavior: 'smooth'});
        
      }, 100);
    },

    //Method that loads the ranking data from the external database through an API
    lookingForVotes () {

      /* if(window.localStorage.getItem('votedDate')){
        let votedDate = new Date(window.localStorage.getItem('votedDate'))
        // console.log("Votaste: "+votedDate)
        let gap = (new Date().getTime() - votedDate.getTime())/(1000*60*60*24)
        // let today = new Date().getDay()
        // let voteDay = votedDate.getDay()
        // console.log(today, voteDay)
        // if(gap>1 || today!==voteDay){
        if(gap>1){
          window.localStorage.removeItem(`voted-${this.newspaper.folder}`)
          window.localStorage.removeItem('votedDate')
        }
        
      } */

      //Builds the API URL
      let api = this.newspaper.db_server + "db.php?cabecera="+this.newspaper.cabecera+"&folder=" + this.newspaper.folder;

      // let api = this.newspaper.db_server + "api2.php/records/" + "posts" + "/";
      // console.log("looking for votes in ", api)
      fetch(api)
      .then(res => res.json())
      .then(json => {
        // console.log("votes", json.length )
        if(json.length){
          this.votes = json;
          this.list.map(el => {
            let votesItem = this.votes.find(o => o.item === el.img_file)
            el.votes = votesItem.votes
            el.votesId = votesItem.id
            // console.log("Votos de ", el.img_file, votesItem.votes)
            })
        }else{
              // console.log("voy a meter 0 votos a todos pq no están en base de datos")
              let items = this.list.length
                  this.list.map(item => {
                      item.votes = 0
                      fetch(this.newspaper.db_server + "db.php", {
                        method: 'POST',
                       
                        body: JSON.stringify({
                          cabecera: this.newspaper.cabecera,
                          folder: this.newspaper.folder,
                          item: item.img_file,
                          votes: 0
                        })
                      })
                      .then(res => res.text()) // OR res.json()
                      .then(() => {
                        // console.log(res)
                        items--
                        if(items===0){
                          this.lookingForVotes()
                        }
                        })
                    })
          }
      }
       ).catch(e => {
        console.log( "error fetching votes: ", e)
      }
      )
      
    },
    getDateFormated(date) {
      let dateOk = new Date(date)
      let year = dateOk.getFullYear()
      let month = dateOk.getMonth()+1
      let day = dateOk.getDate()

      let dateText = `${year}-${month}-${day}`
      return dateText
    }
    
  }
  
}
</script>

<style>
</style>
