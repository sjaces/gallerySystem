<template lang="pug">
    h3 {{ item }}
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            required: true
        }
    }
}
</script>