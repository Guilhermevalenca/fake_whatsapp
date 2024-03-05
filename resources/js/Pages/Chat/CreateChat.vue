<template>
    <DefaultLayout title="Chat">
        <v-card>
            <v-card-title class="text-center">Contatos</v-card-title>
            <v-card-actions class="flex justify-center m-1">
                <v-card-subtitle>Novo grupo</v-card-subtitle>
                <v-card-subtitle @click="show.newContact = true">Novo contato</v-card-subtitle>
                <v-card-subtitle>Nova comunidade</v-card-subtitle>
            </v-card-actions>
            <v-card-text>
                <!--            Renderizar contatos-->
            </v-card-text>
        </v-card>
        <v-dialog v-model="show.newContact">
            <ChatNewContact class="pa-2" />
        </v-dialog>
    </DefaultLayout>
</template>

<script>
import {Link} from '@inertiajs/vue3';
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import ChatNewContact from "@/Components/Chat/ChatNewContact.vue";
export default {
    name: "CreateChat",
    components: {ChatNewContact, DefaultLayout, Link},
    data() {
        return {
            show: {
                newContact: false
            }
        }
    }
}
</script>

<style scoped>

</style>
