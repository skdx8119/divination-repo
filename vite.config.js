import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],

    server: {
        hmr: {
            host: 'localhost',
        },
    },

    build: {
        base: process.env.NODE_ENV === 'production'
            ? 'https://vtuber-compatibility-diagnosis-689c2f0ddc1e.herokuapp.com/'
            : '/',
    },
});
