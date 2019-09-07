<template lang="pug">
	.postit
		.container
			.row
				.col-md-12.animate-in-left
					.item.hidden {{ item.title }}
					img.img-fluid.d-block.mx-auto.firma(v-bind:src="item.img_src" :alt="item.title" @load="fixFirma(this)")
					.firmaFoto
						span.fa.fa-camera-retro.fa-lg {{ item.photographer }}
					h2.lead
						span.colorDestacado 2. 
						| {{ item.title }}
					p.text-left {{ item.text }}
    
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
			fixFirma (img) {
				console.log("img", img)
			}
		}
}
</script>