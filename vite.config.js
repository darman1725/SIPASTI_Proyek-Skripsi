import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
            'resources/css/app.css',
            'resources/css/auth.css', 
            'resources/js/app.js',
            'resources/images/logo.favicon.svg',
            'resources/images/logo.favicon.png',
        ],
        refresh: true,
        }),
    ],
});
