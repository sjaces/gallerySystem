<template lang="pug"> 
		transition-group(name="flip-list", tag="ul")
			li(v-for='item in list', v-bind:key="item.title")
				Item(:item='item' v-on:oneMore="setOneMore(item)")
</template>

<script>
import Item from './item.vue'
export default {
    props: {
        list: {
            type: Array,
            required: true
        }
		},
		components: { Item },
		methods: {
			setOneMore(item){
				this.$emit('oneMore', item.title)
				console.log("lista +1 ", item.title)
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
