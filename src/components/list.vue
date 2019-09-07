<template lang="pug"> 
		ul
			li(v-for='item in list')
				Item(:item='item')
</template>

<script>
import Item from './item.vue'
export default {
    props: {
        list: {
            type: Object,
            required: true
        }
		},
		components: { Item }
}
</script>

<style scoped>
	li {
		list-style: none
	}
</style>
