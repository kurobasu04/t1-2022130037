import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'node_modules/admin-lte/dist/js/adminlte.min.js',
                'node_modules/admin-lte/dist/css/adminlte.min.css',
            ],
            refresh: true,
        }),
    ],
});
