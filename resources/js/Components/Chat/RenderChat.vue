<template>
    <Link :href="route('chat_show', {chat: contact.chat_id})"
          :class="contact.unread_messages === 0 ? '' : 'd-flex justify-between'"
    >
        <div :class="contact.unread_messages === 0 ? '' : 'w-10/12'">
            <v-card-title>{{contact.name}}</v-card-title>
            <v-card-subtitle>{{message}}</v-card-subtitle>
        </div>
        <div v-if="contact.unread_messages !== 0">
            <v-container class="pa-1">
                <v-card-title class="border rounded-full">{{contact.unread_messages}}</v-card-title>
            </v-container>
        </div>
    </Link>
</template>

<script>
import {Link} from '@inertiajs/vue3'
export default {
    name: "RenderChat",
    components: {Link},
    props: {
        contact: Object,
    },
    data() {
        return {
            test: false
        }
    },
    computed: {
        message() {
            const currentMessage = this.contact.chat.current_message;
            if(currentMessage) {
                if(currentMessage.type === 'text') {
                    let prefix;
                    if(this.contact.name.indexOf("(Contato desconhecido)") !== -1){
                        prefix = "Contato desconhecido";
                    } else {
                        prefix = currentMessage.user_id === this.$page.props.auth.user.id ? 'Voce' : this.contact.name;
                    }
                    return prefix + ': ' + currentMessage.content;
                }else {
                    return 'Arquivo';
                }
            } return '';
        }
    },
    mounted() {
        this.$Echo.channel('Messages_' + this.contact.chat.id)
            .listen('SendMessageEvent', data => {
                this.contact.chat.current_message = data.message;
                this.contact.unread_messages += 1;
            });
    }
}
</script>

<style scoped>

</style>
