<template>
    <v-app>
        <Head :title="title" />
        <header class="mt-2 mr-2 ml-2">
            <v-app-bar class="flex justify-between">
                <v-card-title>Fake whatsapp</v-card-title>
                <div class="flex">
                    <v-tooltip text="Alterar o tema da pagina">
                        <template #activator="{ props }">
                            <v-btn
                                v-bind="props"
                                @click="alterTheme()"
                                icon="mdi-theme-light-dark"
                                class="mr-1"
                            />
                        </template>
                    </v-tooltip>
                    <v-tooltip text="Acessar a camera">
                        <template #activator="{ props }">
                            <v-btn
                                icon="mdi-camera-outline"
                                v-bind="props"
                                class="mr-1"
                            />
                        </template>
                    </v-tooltip>
                    <v-tooltip text="Pesquisar">
                        <template #activator="{ props }">
                            <v-btn
                                icon="mdi-magnify"
                                v-bind="props"
                                class="mr-1"
                            />
                        </template>
                    </v-tooltip>
                    <v-menu>
                        <template #activator="{props:menu}">
                            <v-tooltip text="Mais opções">
                                <template #activator="{props: tooltip}">
                                    <span v-bind="tooltip">
                                        <v-btn
                                            v-bind="menu"
                                            icon="mdi-dots-vertical"
                                        />
                                    </span>
                                </template>
                            </v-tooltip>
                        </template>
                        <v-list>
                            <Link :href="route('logout')" method="post" as="button">
                                <v-list-item to="/">
                                    Log Out
                                </v-list-item>
                            </Link>
                        </v-list>
                    </v-menu>
                </div>
            </v-app-bar>
        </header>
        <v-main class="mr-2 ml-2">
            <section class="flex">
                <NavLink :href="route('community')" :active="route().current('community')">
                    <v-icon icon="mdi-account-group" />
                </NavLink>
                <NavLink :href="route('contact_index')" :active="route().current('contact_index')">
                    <v-card-subtitle>Conversas</v-card-subtitle>
                </NavLink>
                <NavLink :href="route('status')" :active="route().current('status')">
                    <v-card-subtitle>Atualizações</v-card-subtitle>
                </NavLink>
                <NavLink :href="route('calls')" :active="route().current('calls')">
                    <v-card-subtitle>Ligações</v-card-subtitle>
                </NavLink>
            </section>
            <section>
                <slot />
            </section>
        </v-main>
    </v-app>
</template>


<script>
import {Head, Link} from '@inertiajs/vue3'
import {useTheme} from "vuetify";
import NavLink from "@/Components/NavLink.vue";
export default {
    name: "DefaultLayout",
    components: {Link, NavLink, Head},
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
    methods: {
        alterTheme() {
            this.theme.global.name = this.theme.global.current.dark ? 'light' : 'dark';
            localStorage.setItem('theme', this.theme.global.name);
        }
    },
}
</script>

<style scoped>

</style>
