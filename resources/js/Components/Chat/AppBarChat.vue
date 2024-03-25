<template>
    <v-app-bar class="text-center">
        <v-btn icon="mdi-arrow-left" @click="$emit('backPage')" />
        <div>{{contact.name ? contact.name : contact.phone}}</div>
        <v-spacer />
        <div class="d-flex justify-end">
            <v-btn icon="mdi-video" />
            <v-btn icon="mdi-phone" />
            <v-btn icon="mdi-dots-vertical" />
        </div>
    </v-app-bar>
</template>

<script>
export default {
    name: "AppBarChat",
    props: {
        contact: {
            name: String | null,
            phone: String | null
        }
    },
    emits: ['backPage']
}
</script>

<style scoped>

</style>
