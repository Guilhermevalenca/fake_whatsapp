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
                <RenderContact v-for="contact in contacts" :key="contact.id" :contact="contact" />
            </v-card-text>
        </v-card>
        <v-dialog v-model="show.newContact">
            <NewContact
                class="pa-4"
                @closed="show.newContact = false"
            />
        </v-dialog>
    </DefaultLayout>
</template>

<script>
import {Link, router} from '@inertiajs/vue3';
import NewContact from "@/Components/Contact/NewContact.vue";
import RenderContact from "@/Components/Contact/RenderContact.vue";

export default {
    name: "CreateChat",
    components: {RenderContact, NewContact, Link},
    data() {
        return {
            show: {
                newContact: false,
            },
        }
    },
    props: {
        contacts: Object,
    },
    created() {
        this.$Echo.channel('contacts' + this.$page.props.auth.user.id)
            .listen('UpdatedContactsEvent', (data) => {
                this.contacts.map(contact => {
                    if(contact.id === data.contact_id) {
                        contact.chat_id = data.chat_id;
                    }
                    return contact;
                })
            })
    },
}
</script>

<style scoped>

</style>
