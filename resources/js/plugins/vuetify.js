import '@mdi/font/css/materialdesignicons.css';

import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

import { createVuetify } from 'vuetify';

export default createVuetify({
    components,
    directives,
    theme: {
        defaultTheme: localStorage.getItem('theme') ? localStorage.getItem('theme') : 'light',
        themes: {
            light: {
                colors: {
                    // primary: '#1867C0', //azul
                    // secondary: '#2f9e41', //verde claro
                    // tertiary: '#2f9e41',
                    // quaternary: '#cd191e', //vermelho
                    // background: '#e1e6d2',
                },
            },
            dark: {
                colors: {
                    // primary: '#1867C0', //azul
                    // surface: '#1c1b1b', //preto
                    // secondary: '#00420c', //verde escuro
                    // tertiary: '#2f9e41', //verde claro
                    // quaternary: '#cd191e', //vermelho
                    background: '#212121', //preto fosco
                },
            },
        },
    },
    defaults: {
        VBtn: {
            variant: 'tonal',
        },
        VTextField: {
            variant: 'outlined',
            clearable: true
        },
        VSelect: {
            variant: 'outlined'
        },
    },
});
