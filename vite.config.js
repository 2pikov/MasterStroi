import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { glob } from 'glob';

export default defineConfig({
    plugins: [
        laravel.default({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                ...glob.sync('resources/css/**/*.css'),
                ...glob.sync('resources/js/**/*.js')
            ],
            refresh: true,
        }),
    ],
});
