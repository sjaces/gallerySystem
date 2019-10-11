<template lang="pug"> 
		transition-group(name="flip-list", tag="div")
			div(v-for='item in list', v-bind:key="number(item)")
				Item(:item='item' v-on:oneMore="setOneMore(item)" :voted="voted" :number="number(item)")
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
		voted:{
			type: Boolean
		}
		},
		components: { Item, Banner },
		computed:{
			totalItems(){
				if(this.list){
					return this.list.length
				}
				return 0
			},
			ratioBanners(){
				if(this.totalItems>10){
					return 5
				}else{return 3}
			}
			
		},
		methods: {
			setOneMore(item){
				this.$emit('oneMore', item.title)
			},
			showBanner(item){
				if(this.number(item) % this.ratioBanners) {
				return false
				}else{ 
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
  /* transition-delay: 1s; */
}

</style>
