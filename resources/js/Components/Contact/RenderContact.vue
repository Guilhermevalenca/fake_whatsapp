<template>
    <v-container @click="contact.chat_id ? getChat() : createChat()">
        <v-card>
            <v-card-title>{{contact.name}}</v-card-title>
            <v-card-subtitle>{{contact.data_contact[0].status ?? 'Usuário sem status'}}</v-card-subtitle>
        </v-card>
    </v-container>
</template>

<script>
import {router} from '@inertiajs/vue3';
export default {
    name: "RenderContact",
    props: {
        contact: {
            id: Number,
            name: String,
            chat_id: Number | null,
            phone: String,
            data_contact: [
                {
                    id: Number,
                    status: String | null,
                    phone: String
                }
            ]
        }
    },
    methods: {
        getChat() {
            router.get(route('chat_show', {chat: this.contact.chat_id}));
        },
        createChat() {
            window.axios.post(route('chat_store'), {
                contact_id: this.contact.id
            })
                .then(response => {
                    router.get(route('chat_show', {chat: response.data.chat}))
                })
                .catch(error => console.log(error));
        },
    }
}
</script>

<style scoped>

</style>
