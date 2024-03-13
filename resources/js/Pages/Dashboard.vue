<template>
    <DefaultLayout title="Dashboard">
        <v-card>
            <div>ola</div>
        </v-card>
        <Link :href="route('chat_create')" >
            <v-btn icon="mdi-chat"
                   class="absolute top-[32rem] left-[19rem] lg:left-[80.5rem] lg:top-[30rem] min-[480px]:top-[53rem] min-[480px]:left-[26rem]"
            />
        </Link>
    </DefaultLayout>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: 'Dashboard',
    components: {Link},
    methods: {

    },
}
</script>
