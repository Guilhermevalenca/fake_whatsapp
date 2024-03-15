<template>
    <v-card>
        <v-form ref="formRef" @submit.prevent="submit()">
            <v-text-field
                label="Nome"
                v-model="form.name"
                placeholder="Escolha o nome do seu contato"
                hint="Exemplo: Dom Pedro primeiro"
                persistent-hint
                :rules="rules.name"
                class="pt-2"
            />
            <input v-show="false" v-mask data-maska="(##) ##### ####" v-model="form.phone">
            <v-text-field
                label="Telefone"
                v-model="form.phone"
                hint="Exemplo: (00) 00000 0000"
                persistent-hint
                :rules="rules.phone"
                class="pt-2 pb-6"
            />
            <v-btn type="submit"
                   class="w-full"
                   :loading="form.processing"
                   :disabled="form.processing"
            >
                Adicionar contato
            </v-btn>
        </v-form>
    </v-card>
</template>

<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "ChatNewContact",
    emits: ['closed'],
    data() {
        const defaultRule = value => {
            return value ? true : 'É necessário preencher este campo';
        }
        return {
            form: useForm({
                phone: '',
                name: ''
            }),
            rules: {
                name: [
                    value => defaultRule(value),
                    () => {
                        if(this.form.errors && this.form.errors.name) {
                            return this.form.errors.name;
                        }
                        return true;
                    }
                ],
                phone: [
                    value => defaultRule(value),
                    () => {
                        if(this.form.errors && this.form.errors.phone) {
                            return this.form.errors.phone;
                        }
                        return true;
                    }
                ]
            }
        }
    },
    methods: {
        submit() {
            this.$refs.formRef.validate()
                .then(result => {
                    if(result.valid) {
                        this.form.phone = this.form.phone.replace(/[()]/g, '')
                            .replace(/\s/g, '');
                        this.form.post(route('contact_store'), {
                            onSuccess: () => this.$emit('closed'),
                            onError: () => this.$refs.formRef.validate()
                        });
                    }
                });
        }
    },
    watch: {

    }
}
</script>


<style scoped>

</style>
