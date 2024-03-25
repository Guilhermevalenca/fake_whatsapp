<template>
    <div :class="['flex', message.user_id === $page.props.auth.user.id ? 'justify-end' : 'justify-start']">
        <div class="d-flex"
             @pointerdown="startLongPress()"
             @click="stopLongPress()"
        >
            <div class="pr-1">{{message.content}}</div>

            <v-icon
                v-if="message.user_id === $page.props.auth.user.id"
                :icon="message.is_send ? 'mdi-check-all' : 'mdi-check'"
                @click="$emit('explaining_icons')"
            />
        </div>
    </div>
</template>

<script>
export default {
    name: "RenderMessages",
    data() {
        return {
            isLongPress: false
        }
    },
    props: {
        message: Object,
    },
    methods: {
        startLongPress() {
            this.isLongPress = true;
            setTimeout(() => {
                this.$emit('update:longPress', this.isLongPress);
            }, 700);
        },
        stopLongPress() {
            this.isLongPress = false;
        }
    },
    emits: ['explaining_icons', 'update:longPress'],
}
</script>

<style scoped>

</style>
