<template>
    <v-form @submit.prevent="contact.chat_id ? getChat() : createChat()">
        <button type="submit" class="w-full">
            <v-container>
                <v-card>
                    <v-card-title>{{contact.name}}</v-card-title>
                    <v-card-subtitle>{{contact.data_contact[0].status ?? 'Usuário sem status'}}</v-card-subtitle>
                </v-card>
            </v-container>
        </button>
    </v-form>
</template>

<script>
import {router, useForm} from '@inertiajs/vue3';
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
    data() {
        return {
            form: useForm({
                contact_id: this.contact.id
            })
        }
    },
    methods: {
        getChat() {
            router.get(route('chat_show', {chat: this.contact.chat_id}));
        },
        createChat() {
            this.form.post(route('chat_store'), {
                onError: error => console.log(error)
            });
        },
    }
}
</script>

<style scoped>

</style>
