import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

import {loadFonts} from "@/plugins/webFontLoades.js";
import Vuetify from './plugins/vuetify.js';
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        loadFonts();
        app.config.globalProperties = {
            ...app.config.globalProperties,
            $Echo: window.Echo,
        };
        app.use(Vuetify);
        app.use(plugin);
        app.use(ZiggyVue);
        app.component('DefaultLayout', DefaultLayout);
        app.mount(el);
        return app;
    },
    progress: {
        color: '#4B5563',
    },
});
