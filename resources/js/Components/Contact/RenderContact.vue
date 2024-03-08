<template>
    <Link :href="contact.exist_chat ? route( 'chat_show', {chat: this.contact.exist_chat}) : route('chat_store', {contact: this.contact.id})" :method="contact.exist_chat ? 'get' : 'post'" as="button">
        <v-container>
            <v-card-title>{{contact.data_contact[0].name}}</v-card-title>
            <v-card-subtitle>Status fixo do usuário</v-card-subtitle>
        </v-container>
    </Link>
</template>

<script>
import {Link} from '@inertiajs/vue3';
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
    }
}
</script>

<style scoped>

</style>
