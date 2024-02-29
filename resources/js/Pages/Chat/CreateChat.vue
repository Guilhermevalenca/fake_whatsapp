<template>
    <v-card>
        <v-card-title>Contatos</v-card-title>
        <v-card-actions>
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
</template>

<script>
import {Link} from '@inertiajs/vue3';
export default {
    name: "CreateChat",
    components: {Link}
}
</script>

<style scoped>

</style>
