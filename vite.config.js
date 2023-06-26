import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
<<<<<<< HEAD
            'resources/css/app.css',
            'resources/css/auth.css', 
            'resources/js/app.js',
            'resources/images/logo.favicon.svg',
            'resources/images/logo.favicon.png',
        ],
        refresh: true,
=======
                'resources/css/app.css',
                'resources/css/auth.css',
                'resources/js/app.js',
                'resources/images/logo/favicon.svg',
                'resources/images/logo/favicon.png',
                'resources/images/logo/favicon2.png',
            ],
            refresh: true,
>>>>>>> 0571b899e1678b504895f1560bdb8963d6e07707
        }),
    ],
});