<template>
    <v-card>
        <v-autocomplete
            label="Email do contato"
            :items="contacts"
            v-model:search="contact"
            item-title="email"
            item-value="id"
            v-model="form.contact"
        />
        <v-container v-if="form.contact">
            <v-list>
                <v-list-item-title>Pessoa selecionada:</v-list-item-title>
                <v-list-item>Nome: {{contact_name}}</v-list-item>
                <v-list-item>Email: {{contact_email}}</v-list-item>
            </v-list>
        </v-container>
        <v-btn
            :disabled="! form.contact"
            @click="addContact()"
        >
            Adicionar contato
        </v-btn>
    </v-card>
</template>

<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "ChatNewContact",
    emits: ['closed'],
    data() {
        return {
            contact: '',
            contacts: [],
            form: useForm({
                contact: '',
            })
        }
    },
    methods: {
        async getContacts() {
            axios.post(route('contact_search'), {
                email: this.contact
            })
                .then(response => this.contacts = response.data)
                .catch(error => console.log(error));
        },
        addContact() {
            this.form.post(route('contact_store'), {
                onError: (error) => console.log(error),
                onSuccess: () => this.$emit('closed')
            });
        }
    },
    watch: {
        contact: {
            handler($new) {
                if($new && ($new.length === 1 || $new.length === 3 || $new.length === 5)) {
                    this.getContacts();
                }
            },
            deep: true
        }
    },
    computed: {
        contact_name() {
            return this.contacts.map(value => {
                if(value.id === this.form.contact) {
                    return value.name;
                }
            })[0]
        },
        contact_email() {
            return this.contacts.map(value => {
                if(value.id === this.form.contact) {
                    return value.email
                }
            })[0]
        }
    }
}
</script>


<style scoped>

</style>
