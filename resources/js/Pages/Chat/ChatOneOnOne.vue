<template>
    <v-app>
        <Head :title="contact.name ? contact.name : 'Desconhecido'" />
        <AppBarChat v-show="!showOptionsMessage" :contact="contact" @backPage="backPage()" />
        <AppBarOptionsChat v-show="showOptionsMessage" />
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
                <RenderMessages
                    v-for="message in reverseOrientationMessageData"
                    :key="message.id"
                    :message="message"
                    @explaining_icons="showExplainingIcons = true"
                    @update:longPress="value => showOptionsMessage = value"
                />
            </v-container>
        </v-infinite-scroll>
        <v-footer class="position-fixed top-[36rem] w-full ma-0">
            <SendMessage :chat="chat" />
        </v-footer>
        <v-dialog v-model="showExplainingIcons">
            <v-card>
                <v-container class="flex justify-between">
                    <div class="p-1">Mensagem enviada</div>
                    <v-icon icon="mdi-check" />
                </v-container>
                <v-container class="flex justify-between">
                    <div class="p-1">Mensagem lida</div>
                    <v-icon icon="mdi-check-all" />
                </v-container>
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
import {Head, router} from "@inertiajs/vue3";
import RenderMessages from "@/Components/Chat/RenderMessages.vue";
import SendMessage from "@/Components/Chat/SendMessage.vue";
import AppBarChat from "@/Components/Chat/AppBarChat.vue";
import AppBarOptionsChat from "@/Components/Chat/AppBarOptionsChat.vue";
export default {
    name: "ChatOneOnOne",
    components: {AppBarOptionsChat, AppBarChat, SendMessage, RenderMessages, Head},
    props: {
        chat: Object,
        messages: Object,
        contact: Object,
        showOptionsMessage: false
    },
    data() {
        return {
            reverseOrientationMessageData: this.messages.data.reverse(),
            current_page: 1,
            showExplainingIcons: false
        }
    },
    methods: {
        backPage() {
            router.get(route('contact_index'));
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
    mounted() {
        const echoChannel = this.$Echo.channel('Messages_' + this.chat.id);
        echoChannel.listen('SendMessageEvent', (data) => {
                const findId = this.reverseOrientationMessageData.find(message => message.id === data.message.id);
                if(!findId) {
                    this.reverseOrientationMessageData.push(data.message);
                }
                axios.get(route('messages_updated_send', {chat: this.chat}));
            });
        echoChannel.listen('UpdateCheckMessageEvent', (data) => {
                if(data.messages) {
                    this.reverseOrientationMessageData.map(message => {
                        if(data.messages.find(value => value.id === message.id)) {
                            message.is_send = 1;
                        }
                        return message;
                    });
                }
            });
        console.log(this.contact);
    },
    unmounted() {
        this.$Echo.leaveChannel('Messages_' + this.chat.id);
    }
}
</script>

<style scoped>

</style>
