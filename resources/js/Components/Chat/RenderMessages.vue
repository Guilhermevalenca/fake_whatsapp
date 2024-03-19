<template>
    <div :class="['flex', message.user_id === $page.props.auth.user.id ? 'justify-end' : 'justify-start']">
        <div class="d-flex">
            <div class="pr-1">{{message.content}}</div>
            <v-icon
                v-if="message.user_id === $page.props.auth.user.id"
                :icon="message.is_send ? 'mdi-check-all' : 'mdi-check'"
            />
        </div>
    </div>
</template>

<script>
export default {
    name: "RenderMessages",
    props: {
        message: Object,
    },
}
</script>

<style scoped>

</style>
