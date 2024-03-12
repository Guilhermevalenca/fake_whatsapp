<template>
    <v-container @click="contact.exist_chat ? getChat() : createChat()">
        <v-card-title>{{contact.data_contact[0].name}}</v-card-title>
        <v-card-subtitle>Status fixo do usuário</v-card-subtitle>
    </v-container>
</template>

<script>
import {Link, router, useForm} from '@inertiajs/vue3';
export default {
    name: "RenderContact",
    components: {Link},
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
            const {post} = useForm({
                contact: this.contact.id
            });
            post(route('chat_store'));
        },
    }
}
</script>

<style scoped>

</style>
