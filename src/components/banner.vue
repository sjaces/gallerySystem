<template>
    <div :id="bannerId" class="ad bbt-adv-container" style="display:none;"></div>
</template>

<script>
export default {
    props: {
        number: {
            type: Number,
            required: true
        }
    },
        computed:{
            bannerId() {
                if(this.number){
                    return "bbt-ad-slot-right"+this.number
                }else{return ''}
            }
        }
}
</script>

<style>

</style>
