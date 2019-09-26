<template lang="pug" scoped>
	.postit
		.container
			.row
				.col-md-12
					.item.hidden(v-html="item.title")
					div.imageGroup
						.voteBar(v-if="votesVisible")
							p Votos: {{ item.votes }}
								template(v-if="!voted")
									button.btn(@click="oneMore") +1
						img.img-fluid.d-block.mx-auto.firma(v-bind:src="img_file" :alt="item.title" @load="fixFirma()")
						.firmaFoto(v-if="item.photographer")
							span.fa.fa-camera-retro.fa-lg &nbsp; {{ item.photographer }}
						br(v-if="!item.photographer")
						//- .voteSticker(v-if="votesVisible")
						//- 	p Votos: {{ item.votes }}
						//- 	template(v-if="!voted")
						//- 		button.btn(@click="oneMore") +1
					h2.lead
						span.colorDestacado {{ number }}. 
						span(v-html="item.title") 
					p.text-left(:id="item.title", v-html="item.text") 
					
    
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            required: true
        },
		voted: {
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
		},
		votesVisible() {
			if(this.item.votes) return true
		}
	},
	methods: {
		fixFirma () {
			if(this.item.photographer){

			const myImage = document.getElementsByClassName('firma')[this.number+1]
			const width = myImage.width
			myImage.nextSibling.setAttribute("style", "width:" + width + "px ;display: inline-block; position: relative; margin-top: -20px;")
			myImage.previousSibling.setAttribute("style", "width:"+width+"px;")
				}

		},
		oneMore () {
			this.$emit('oneMore', this.item.title)
		}
	}
}
</script>

<style lang="scss" >
	.imageGroup{
		position: relative;
		& img{
			margin-top: 0;
		}
	}

	.voteBar {
		/* width: 50%; */
		margin: 0 auto;
		background: var(--colorDestacado);
		/* border-radius: 15px 15px 0 0; */
		padding: .2em 0;
		font-size: 0.8em;
		& p {
			color: var(--fondo);
			margin: 0;
			font-weight: 900;
			& button {
				background: var(--fondo);
				margin: 0 1em;
			}
		}
	}

	.voteSticker {
		position: absolute;
    justify-content: center;
    flex-direction: column;
    bottom: 2em;
    right: 1em;
    display: flex;
    width: 7em;
    height: 7em;
    border-radius: 52%;
    padding: 0.5em 1.5em;
    background-color: var(--colorDestacado);
    color: var(--fondo);
		& p{
			display: inline-block;
			font-weight: 800;
		color: var(--fondo);}

		& button {
		    border-radius: 50%;
    width: 3em;
    text-align: center;
    height: 3em;
    display: block;
    margin: 0 auto;
    padding: 0;
    font-weight: 700;
		}

		
	}
</style>