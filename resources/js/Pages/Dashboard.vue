<template>
    <DefaultLayout title="Dashboard">
        <v-container>
            <v-card
                v-for="contact in contacts.data"
                :key="contact.id"
            >
                <RenderChat :contact="contact" />
            </v-card>
        </v-container>
        <Link :href="route('chat_create')" >
            <v-btn icon="mdi-chat"
                   class="position-fixed top-[38rem] left-[20rem] lg:left-[80.5rem] lg:top-[30rem] min-[480px]:top-[53rem] min-[480px]:left-[26rem]"
            />
        </Link>
    </DefaultLayout>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import RenderChat from "@/Components/Chat/RenderChat.vue";

export default {
    name: 'Dashboard',
    components: {RenderChat, Link},
    props: {
        contacts: Object,
    },
    mounted() {
        console.log(this.contacts);
    }
}
</script>
