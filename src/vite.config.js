import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            hotFile: 'storage/vite.hot',
            buildDirectory: 'public/build/assets',
            input: ['resources/js/app.js','resources/css/app.css'],
        }),
    ],
    build: {
        manifest: 'public/build/manifest.json',
    },
});
