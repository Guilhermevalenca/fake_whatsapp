<template>
    <Link :href="route('chat_show', {chat: contact.chat_id})">
        <v-card-title>{{contact.name}}</v-card-title>
        <v-card-subtitle>{{message}}</v-card-subtitle>
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
                    const prefix = currentMessage.user_id === this.$page.props.auth.user.id ? 'Voce' : this.contact.name;
                    return prefix + ': ' + currentMessage.content;
                }else {
                    return 'Arquivo';
                }
            } return '';
        }
    }
}
</script>

<style scoped>

</style>
