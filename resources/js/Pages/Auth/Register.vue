<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import {ref} from "vue";

const form = useForm({
    name: '',
    email: '',
    phone: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const defaultRules = [
    value => {
        return value ? true : 'É necessario inserir um valor a este campo';
    },
]
const confirmPassword = [
    value => {
        return value === form.password ? true : 'Senhas diferentes';
    }
]
const showPassword = ref(false);
const showConfirmationPassword = ref(false);
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <v-text-field
                    label="Nome"
                    type="text"
                    v-model="form.name"
                    :rules="defaultRules"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <v-text-field
                    label="Email"
                    type="email"
                    v-model="form.email"
                    :rules="defaultRules"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <v-text-field-simplemask
                    label="Telefone"
                    type="text"
                    v-model="form.phone"
                    :rules="defaultRules"
                    :options="{
                        inputMask: '(##) #####-####',
                        outputMask: '###########',
                        empty: null,
                        applyAfter: false,
                        alphanumeric: true,
                        lowerCase: false,
                    }"
                />
                <div>{{form.phone}}</div>
                <InputError class="mt-2" :message="form.errors.phone" />
            </div>

            <div class="mt-4">
                <v-text-field
                    label="Senha"
                    :type="showPassword ? 'text' : 'password'"
                    v-model="form.password"
                    :rules="defaultRules"
                    :append-inner-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                    @click:append-inner="showPassword = !showPassword"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <v-text-field
                    label="Confirme sua senha"
                    :type="showConfirmationPassword ? 'text' : 'password'"
                    v-model="form.password_confirmation"
                    :rules="confirmPassword"
                    :append-inner-icon="showConfirmationPassword ? 'mdi-eye' : 'mdi-eye-off'"
                    @click:append-inner="showConfirmationPassword = !showConfirmationPassword"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Já registrado?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registrar
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
