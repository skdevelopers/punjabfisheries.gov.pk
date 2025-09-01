import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),  // new Tailwind v4 Vite plugin
    ],
    build: {
        chunkSizeWarningLimit: 2000, // suppress warnings until you code-split
    },
});
