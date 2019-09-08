<template lang="pug"> 
		ul
			li(v-for='item in list')
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
				console.log("lista +1 ", item.title)
				this.$emit('oneMore', item.title)
			}
		}
}
</script>

<style scoped>
	li {
		list-style: none
	}
</style>
