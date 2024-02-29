<template>
    <DefaultLayout title="Dashboard">
        <v-card>

        </v-card>
        <v-btn icon="mdi-chat"
               class="absolute top-[32rem] left-[19rem] lg:left-[81rem] lg:top-[31rem] min-[480px]:top-[53rem] min-[480px]:left-[26rem]"
        />
    </DefaultLayout>
</template>

<script>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

export default {
    name: 'Dashboard',
    components: {DefaultLayout},
}
</script>
