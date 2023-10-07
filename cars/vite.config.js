import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/sass/dashboard.scss',
                'resources/sass/car_list.scss',

                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    optimizeDeps: {
        exclude: ['jquery'],
    },
});
