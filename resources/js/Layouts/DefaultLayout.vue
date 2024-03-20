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
            <section>
                <v-tabs v-model="current_page">
                    <Link :href="route('community_index')">
                        <v-tab value="community_index">
                            <v-icon icon="mdi-account-group" />
                        </v-tab>
                    </Link>
                    <Link :href="route('contact_index')">
                        <v-tab v-if="route().current('chat_create')" value="chat_create">
                            <v-card-subtitle>Conversas</v-card-subtitle>
                        </v-tab>
                        <v-tab v-else value="contact_index">
                            <v-card-subtitle>Conversas</v-card-subtitle>
                        </v-tab>
                    </Link>
                    <Link :href="route('status_index')">
                        <v-tab value="status_index">
                            <v-card-subtitle>Atualizações</v-card-subtitle>
                        </v-tab>
                    </Link>
                    <Link :href="route('calls_index')">
                        <v-tab value="calls_index">
                            <v-card-subtitle>Ligações</v-card-subtitle>
                        </v-tab>
                    </Link>
                </v-tabs>
            </section>
            <section>
                <v-window v-model="current_page">
                    <v-window-item :value="route().current()">
                        <slot />
                    </v-window-item>
                </v-window>
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
        },

    },
    data() {
        return {
            theme: useTheme(),
            current_page: route().current()
        }
    },
    methods: {
        alterTheme() {
            this.theme.global.name = this.theme.global.current.dark ? 'light' : 'dark';
            localStorage.setItem('theme', this.theme.global.name);
        },
    },
}
</script>

<style scoped>

</style>
