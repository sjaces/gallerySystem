<template lang="pug" scoped>
	.postit
		.container
			.row
				.col-md-12
					.item.hidden {{ item.title }} 
					img.img-fluid.d-block.mx-auto.firma(v-bind:src="img_file" :alt="item.title" @load="fixFirma()")
					.firmaFoto(v-if="item.photographer")
						span.fa.fa-camera-retro.fa-lg &nbsp; {{ item.photographer }}
					br(v-if="!item.photographer")
					h2.lead
						span.colorDestacado {{ number }}. 
						span(v-html="item.title") 
					p.text-left(:id="item.title", v-html="item.text") 
					template(v-if="votes")
						p Votos: {{ item.votes }}
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
		},
		number:{
			type: Number,
			required: true
		}
	},
	computed: {
		img_file () {
			return "./data/imagenes/"+this.item.img_file;
		}
	},
	methods: {
		fixFirma () {
			if(this.item.photographer){

			const myImage = document.getElementsByClassName('firma')[this.number+1]
			const width = myImage.width
			myImage.nextSibling.setAttribute("style", "width:" + width + "px ;display: inline-block; position: relative; margin-top: -20px;")//
				}

		},
		oneMore () {
			this.$emit('oneMore', this.item.title)
		}
	}
}
</script>