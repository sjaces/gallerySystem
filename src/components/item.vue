<template lang="pug">
	.postit
		.container
			.row
				.col-md-12.animate-in-left
					.item.hidden {{ item.title }} 
					img.img-fluid.d-block.mx-auto.firma(v-bind:src="item.img_src" :alt="item.title" @load="fixFirma()")
					.firmaFoto
						span.fa.fa-camera-retro.fa-lg {{ item.photographer }}
					h2.lead
						span.colorDestacado {{ item.rank }}. 
						| {{ item.title }}
					p.text-left {{ item.text }}
					p Puntos: {{ item.rank }}
					button.brn.btn-primary(@click="oneMore") +1
    
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            required: true
        }
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