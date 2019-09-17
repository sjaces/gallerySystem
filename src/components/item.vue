<template lang="pug" scoped>
	.postit
		.container
			.row
				.col-md-12.animate-in-left
					.item.hidden {{ item.title }} 
					img.img-fluid.d-block.mx-auto.firma(v-bind:src="item.img_src" :alt="item.title" @load="fixFirma()")
					.firmaFoto(v-if="item.photographer")
						span.fa.fa-camera-retro.fa-lg &nbsp; {{ item.photographer }}
					br(v-if="!item.photographer")
					h2.lead
						span.colorDestacado {{ number }}. 
						span(:id="number") {{ item.title }}
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
		},
		number:{
			type: Number,
			required: true
		}
		},
		mounted() {
			document.getElementById(this.number).innerHTML = this.item.title
			document.getElementById(this.item.title).innerHTML = this.item.text
		},
		methods: {
			fixFirma () {
				if(this.item.photographer){

				// console.log("img", this.item.img_src)
				const myImage = document.getElementsByClassName('firma')[this.number+1]
				const width = myImage.width
				// console.log("width",width)
				myImage.nextSibling.setAttribute("style", "width:" + width + "px ;display: inline-block; position: relative; margin-top: -20px;")//
				 }

			},
			oneMore () {
				this.$emit('oneMore', this.item.title)
				// console.log("+1", this.item.title)
			}
		}
}
</script>