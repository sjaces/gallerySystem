<template lang="pug"> 
		transition-group(name="flip-list", tag="div")
			div(v-for='item in list', v-bind:key="number(item)")
				Item(:item='item' v-on:oneMore="setOneMore(item)" :votes="votes" :number="number(item)")
				Banner(v-if="showBanner(item)" :number="(number(item)/ratioBanners)") 
</template>

<script>
import Item from './item.vue'
import Banner from './banner.vue'
export default {
    props: {
        list: {
            type: Array,
            required: true
        },
		votes:{
			type: Boolean
		}
		},
		components: { Item, Banner },
		computed:{
			totalItems(){
				if(this.list){
					return this.list.length
				}
			},
			ratioBanners(){
				if(this.totalItems>10){
					return 5
				}else{return 3}
			}
			// position(e){
			// 	return this.list.indexOf(e)
			// }
		},
		methods: {
			setOneMore(item){
				this.$emit('oneMore', item.title)
				// console.log("lista +1 ", item.title)
			},
			showBanner(item){
				// console.log(this.number(item))
				if(this.number(item) % this.ratioBanners) {
					//  console.log(false)
				return false
				}else{ 
				// console.log(true)
				return true }
			},
			number(item){
				return (this.list.indexOf(item) + 1)
			}
		}
}
</script>

<style scoped>
.flip-list-move {
  transition: transform 1s;
}
	/* li {
		list-style: none
	} */
</style>
