<template>
    {{chat}}
</template>

<script>
export default {
    name: "ChatOneOnOne",
    props: {
        chat: Object,
        messages: Object,
        contact: Object
    },
    mounted() {
        console.log(this.chat, this.messages, this.contact);
    }
}
</script>

<style scoped>

</style>
