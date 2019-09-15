<template lang="pug" scoped>
	.postit
		.container
			.row
				.col-md-12.animate-in-left
					.item.hidden {{ item.title }} 
					img.img-fluid.d-block.mx-auto.firma(v-bind:src="item.img_src" :alt="item.title" @load="fixFirma()")
					.firmaFoto
						span.fa.fa-camera-retro.fa-lg {{ item.photographer }}
					h2.lead
						span.colorDestacado {{ item.votes }}. 
						| {{ item.title }}
					p.text-left(:id="item.title")
					template(v-if="votes")
						p Puntos: {{ item.votes }}
						button.brn.btn-primary(@click="oneMore") +1
    
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            required: true
        },
		votes: {
			type: Boolean
		}
		},
		mounted() {
			document.getElementById(this.item.title).innerHTML = this.item.text
		},
		methods: {
			fixFirma () {
				// console.log("img", this)
			},
			oneMore () {
				this.$emit('oneMore', this.item.title)
				console.log("+1", this.item.title)
			}
		}
}
</script>