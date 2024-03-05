<template>
    <v-card>
        <v-text-field
            label="Contato"
            placeholder="Digite o email do seu novo contato"
        />
        <v-card-text>
            <div></div>
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    name: "ChatNewContact",
    data() {
        return {
            contact: ''
        }
    },
    methods: {
        getContacts() {
            axios.post(route(''))
        }
    }
}
</script>


<style scoped>

</style>
