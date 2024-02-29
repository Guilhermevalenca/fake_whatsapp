<template>
    <v-app>
        <Head :title="title" />
        <header class="mt-2 mr-2 ml-2">
            <section class="flex justify-between">
                <v-card-title>Fake whatsapp</v-card-title>
                <div>
                    <v-btn icon="mdi-camera-outline" />
                    <v-btn icon="mdi-magnify" />
                    <v-btn icon="mdi-dots-vertical" />
                </div>
            </section>
            <section class="mt-1 flex">
                <NavLink :href="route('community')" :active="route().current('community')">
                    <v-icon icon="mdi-account-group" />
                </NavLink>
                <NavLink :href="route('home')" :active="route().current('home')">
                    <v-card-subtitle>Conversas</v-card-subtitle>
                </NavLink>
                <NavLink :href="route('status')" :active="route().current('status')">
                    <v-card-subtitle>Atualizações</v-card-subtitle>
                </NavLink>
                <NavLink :href="route('calls')" :active="route().current('calls')">
                    <v-card-subtitle>Ligações</v-card-subtitle>
                </NavLink>
            </section>
        </header>
        <v-main class="mr-2 ml-2">
            <section>
                <slot />
            </section>
        </v-main>
    </v-app>
</template>


<script>
import {Head} from '@inertiajs/vue3'
import {useTheme} from "vuetify";
import NavLink from "@/Components/NavLink.vue";
export default {
    name: "DefaultLayout",
    components: { NavLink, Head},
    props: {
        title: {
            type: String,
            required: true,
        }
    },
    data() {
        return {
            theme: useTheme()
        }
    },
    created() {
        this.theme.global.name = 'dark';
    }
}
</script>

<style scoped>

</style>
