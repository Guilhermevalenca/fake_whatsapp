<template>
    <DefaultLayout title="Chat">
        <v-card>
            <v-card-title class="text-center">Contatos</v-card-title>
            <v-card-actions class="flex justify-center">
                <Link>
                    <v-btn>Novo grupo</v-btn>
                </Link>
                <Link>
                    <v-btn>Novo contato</v-btn>
                </Link>
                <Link>
                    <v-btn>Nova comunidade</v-btn>
                </Link>
            </v-card-actions>
            <v-card-text>
                <!--            Renderizar contatos-->
            </v-card-text>
        </v-card>
    </DefaultLayout>
</template>

<script>
import {Link} from '@inertiajs/vue3';
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
export default {
    name: "CreateChat",
    components: {DefaultLayout, Link}
}
</script>

<style scoped>

</style>
