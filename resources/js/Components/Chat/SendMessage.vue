<template>
    <v-text-field
        v-model="form.content"
        append-inner-icon="mdi-send"
        @click:append-inner="submit()"
        :loading="form.processing"
    />
</template>


<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "SendMessage",
    props: {
        chat: Object
    },
    data() {
        return {
            form: useForm({
                content: '',
                type: 'text',
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(route('messages_store', {chat: this.chat}), {
                onSuccess: () => this.form.reset(),
                onError: e => console.log(e)
            })
        }
    }
}
</script>

<style scoped>

</style>
