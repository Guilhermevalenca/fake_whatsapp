<template>
    <v-container @click="contact.exist_chat ? getChat() : createChat()">
        <v-card-title>{{contact.data_contact[0].name}}</v-card-title>
        <v-card-subtitle>Status fixo do usuário</v-card-subtitle>
    </v-container>
</template>

<script>
import {router} from '@inertiajs/vue3';
export default {
    name: "RenderContact",
    props: {
        contact: {
            id: Number,
            contact: Number,
            data_contact: Array,
            exist_chat: Object
        }
    },
    mounted() {
        console.log(this.contact);
    },
    methods: {
        getChat() {
            router.get(route('chat_show', {chat: this.contact.exist_chat}));
        },
        createChat() {
            window.axios.post(route('chat_store'), {
                contact_id: this.contact.id
            })
                .then(response => router.get(route('chat_show', {chat: response.data.chat})))
                .catch(error => console.log(error));
        },
    }
}
</script>

<style scoped>

</style>
