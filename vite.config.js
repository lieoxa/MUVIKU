import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // Add this block below:
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'YOUR_COMPUTER_IP_ADDRESS', // e.g., '192.168.1.5'
        },
    },
});
