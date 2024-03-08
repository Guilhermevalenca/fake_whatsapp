<template>
    <DefaultLayout title="Chat">
        <v-card>
            <v-card-title class="text-center">Contatos</v-card-title>
            <v-card-actions class="flex justify-center m-1">
                <v-card-subtitle>
                    <button>Novo grupo</button>
                </v-card-subtitle>
                <v-card-subtitle @click="show.newContact = true">
                    <button>Novo contato</button>
                </v-card-subtitle>
                <v-card-subtitle>
                    <button>Nova comunidade</button>
                </v-card-subtitle>
            </v-card-actions>
            <v-card-text>
                <RenderContact v-for="contact in contacts.data" :key="contact.id" :contact="contact" />
            </v-card-text>
        </v-card>
        <v-dialog v-model="show.newContact">
            <NewContact
                class="pa-2"
                @closed="show.newContact = false"
            />
        </v-dialog>
    </DefaultLayout>
</template>

<script>
import {Link} from '@inertiajs/vue3';
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import NewContact from "@/Components/Contact/NewContact.vue";
import RenderContact from "@/Components/Contact/RenderContact.vue";

export default {
    name: "CreateChat",
    components: {RenderContact, NewContact, DefaultLayout, Link},
    data() {
        return {
            show: {
                newContact: false
            }
        }
    },
    props: {
        contacts: {
            data: Array
        },
    },
}
</script>

<style scoped>

</style>
