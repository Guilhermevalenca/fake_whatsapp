<template>
    <div :class="['flex', message.user_id === $page.props.auth.user.id ? 'justify-end' : 'justify-start']" @pointerdown="startLongPress()"
         @click="stopLongPress()">
        <div class="d-flex">
            <div class="pr-1 select-none">{{message.content}}</div>

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
            isLongPress: false,
        }
    },
    props: {
        message: Object,
        pressed: Boolean
    },
    methods: {
        startLongPress() {
            if(!this.pressed) {
                setTimeout(() => {
                    this.isLongPress = true;
                }, 700);
            }
        },
        stopLongPress() {
            if(!this.pressed) {
                this.isLongPress = false;
            } else {
                this.isLongPress = !this.isLongPress;
            }
        }
    },
    emits: ['explaining_icons', 'update:longPress'],
    mounted() {
        this.$emit('update:longPress', this.isLongPress);
    },
    watch: {
        isLongPress: {
            handler($new) {
                this.$emit('update:longPress', $new);
            },
            deep: true
        }
    }
}
</script>

<style scoped>

</style>
