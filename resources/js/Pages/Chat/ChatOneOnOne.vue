<template>
    {{chat}}
</template>

<script>
export default {
    name: "ChatOneOnOne",
    props: {
        chat: Object,
        messages: Object,
    },
    mounted() {
        console.log(this.chat, this.messages);
    }
}
</script>

<style scoped>

</style>
