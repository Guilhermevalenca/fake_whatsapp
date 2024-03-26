<template>
    <v-app-bar class="text-center">
        <v-btn icon="mdi-arrow-left" @click="$emit('close')" />
        <div>{{quant_select}}</div>
        <v-spacer />
        <v-btn icon="mdi-home" />
        <v-btn icon="mdi-home" />
        <v-btn icon="mdi-delete" color="error" @click="deleteMessages()" />
        <v-menu>
            <template #activator="{props}">
                <v-btn icon="mdi-dots-vertical" v-bind="props" />
            </template>
            <v-list>
                <v-list-item>
                    <v-btn icon="mdi-home" />
                </v-list-item>
                <v-list-item>
                    <v-btn icon="mdi-home" />
                </v-list-item>
                <v-list-item>
                    <v-btn icon="mdi-home" />
                </v-list-item>
                <v-list-item>
                    <v-btn icon="mdi-home" />
                </v-list-item>
            </v-list>
        </v-menu>
    </v-app-bar>
</template>

<script>
export default {
    name: "AppBarOptionsChat",
    props: {
        quant_select: Number,
        messages_selected: Object
    },
    methods: {
        deleteMessages() {
            const requests = this.messages_selected.map(value => {
                if(value) {
                    return axios.delete(route('messages_delete', {message: value}));
                }
            });
            Promise.all(requests)
                .then(responses => {
                console.log(responses);
            })
                .catch(errors => {
                    console.log(errors)
                });
        }
    }
}
</script>

<style scoped>

</style>
