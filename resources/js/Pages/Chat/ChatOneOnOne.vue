<template>
    <v-app>
        <Head :title="contact.name" />
        <v-app-bar class="text-center">
            <v-btn icon="mdi-arrow-left" @click="getChats()" />
            <div>{{contact.name}}</div>
            <div class="d-flex justify-end">
                <v-btn icon="mdi-video" />
                <v-btn icon="mdi-phone" />
                <v-btn icon="mdi-dots-vertical" />
            </div>
        </v-app-bar>
        <div class="ma-8" />
        <v-infinite-scroll
            side="start"
            height="520"
            @load="getMoreMessages"
            mode="manual"
            empty-text="Sem mais mensagens"
        >
            <template v-slot:load-more="{ props }">
                <v-btn
                    icon="mdi-refresh"
                    size="small"
                    variant="text"
                    v-bind="props"
                ></v-btn>
            </template>
            <v-container>
                <RenderMessages v-for="message in reverseOrientationMessageData" :key="message.id" :message="message" />
            </v-container>
        </v-infinite-scroll>
        <v-footer class="position-fixed top-[36rem] w-full ma-0">
            <SendMessage :chat="chat" />
        </v-footer>
    </v-app>
</template>

<script>
import {router, Head} from "@inertiajs/vue3";
import RenderMessages from "@/Components/Chat/RenderMessages.vue";
import SendMessage from "@/Components/Chat/SendMessage.vue";
export default {
    name: "ChatOneOnOne",
    components: {SendMessage, RenderMessages, Head},
    props: {
        chat: Object,
        messages: Object,
        contact: Object,
    },
    data() {
        return {
            reverseOrientationMessageData: this.messages.data.reverse(),
            current_page: 1
        }
    },
    methods: {
        getChats() {
            router.get(route('chat_create'));
        },
        getMoreMessages({done}) {
            done('loading');
            if(this.current_page < this.messages.last_page) {
                this.current_page += 1;
                axios.get(route('messages_show', {chat: this.chat.id}), {
                    params: {
                        page: this.current_page
                    }
                })
                    .then(response => {
                        const data = response.data.data.reverse()
                        this.reverseOrientationMessageData.unshift(...data);
                        if(this.current_page === this.messages.last_page) {
                            done('empty');
                        } else {
                            done('ok');
                        }
                    })
                    .catch(error => {
                        console.log(error);
                        done('error');
                    });
            } else {
                done('empty');
            }
        }
    },
    created() {
        this.$Echo.channel('Messages_' + this.chat.id)
            .listen('SendMessageEvent', (data) => {
                const findId = this.reverseOrientationMessageData.find(message => message.id === data.message.id);
                if(!findId) {
                    this.reverseOrientationMessageData.push(data.message);
                }
            });
    },
}
</script>

<style scoped>

</style>
