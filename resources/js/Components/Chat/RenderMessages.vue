<template>
    <div :class="['flex', message.user_id === $page.props.auth.user.id ? 'justify-end' : 'justify-start']">
        <div>{{message.content}}</div>
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
