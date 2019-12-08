<template lang="pug" scoped>
	.postit
		.container
			.row
				.col-md-12
					.item.hidden(v-html="item.title")
					div.imageGroup(v-lazyload)
						.voteBar(v-if="votesVisible")
							p Votos: {{ item.votes }}
								template(v-if="!voted && !closedVoting")
									button.btn(@click="oneMore") Vota <i class="fa fa-thumbs-up"></i>
						img.img-fluid.d-block.mx-auto(:src="imgDefault" :data-url="img_file" :alt="item.title" @click="oneMore")
						.firmaFoto(v-if="item.photographer")
							span.fa.fa-camera-retro.fa-lg 
							span.space {{ item.photographer }}
						br(v-if="!item.photographer")
						//- .voteSticker(v-if="votesVisible")
						//- 	p Votos: {{ item.votes }}
						//- 	template(v-if="!voted")
						//- 		button.btn(@click="oneMore") +1
					h2.lead
						span.colorDestacado(v-if="numbers") {{ number }}. 
						span(v-html="item.title") 
					div(:id="item.title", :class="alignment", v-html="item.text") 
					
    
</template>

<script>
import ImageDefault from "../assets/image.png";
import ImageLoading from "../assets/loading.gif";
export default {
  props: {
    item: {
      type: Object,
      required: true
    },
    voted: {
      type: Boolean
    },
    closedVoting: {
      type: Boolean
    },
    number: {
      type: Number,
      required: true
    },
    numbers: {
      type: Boolean,
      default: true
    },
    alignment: {
      type: String,
      default: "text-left"
    }
  },
  computed: {
    img_file() {
      if (!this.item.img_file) return ImageDefault;
      return "./data/imagenes/" + this.item.img_file;
    },
    votesVisible() {
      if (this.item.votes) return true;
      return false;
    },
    imgDefault() {
      return ImageLoading;
    }
  },
  methods: {
    oneMore() {
      this.$emit("oneMore", this.item.title);
    }
  }
};
</script>

<style lang="scss" >
.imageGroup {
  position: relative;
  width: fit-content;
  margin: 0 auto;
  & img {
    margin-top: 0;
  }
}

.voteBar {
  /* width: 50%; */
  /* height: 3.6em; */
  margin: 0 auto;
  background: var(--colorDestacado);
  /* border-radius: 15px 15px 0 0; */
  padding: 0.2em 0;
  font-size: 0.8em;
  & p {
    color: var(--fondo);
    margin: 0 0.5em;
    font-weight: 900;
    font-size: 1.2em;
    & button {
      background: var(--fondo);
      margin: 0 1.4em;
      color: var(--colorDestacado);
      font-size: 1.1em;
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
  & p {
    display: inline-block;
    font-weight: 800;
    color: var(--fondo);
  }

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

.space::before {
  content: " ";
}
.btn {
  margin: 0.4em 0.5em;
}
</style>