<template>
    <div :class="['flex', message.user_id === $page.props.auth.user.id ? 'justify-end' : 'justify-start']">
        <div>{{message.content}}</div>
    </div>
</template>

<script>
import {router} from "@inertiajs/vue3";

export default {
    name: "RenderMessages",
    props: {
        message: Object,
        chat: Number
    },
    created() {
        this.$Echo.channel('Messages_' + this.chat + ',user_' + this.$page.props.auth.user.id)
            .listen('SendMessageEvent', () => {
                router.get(route('chat_show', {chat: this.chat}))
            });
    }
}
</script>

<style scoped>

</style>
