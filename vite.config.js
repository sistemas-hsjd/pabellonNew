import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/css/all.min.css', 
                'resources/assets/css/adminlte.css', 
                'resources/assets/css/ionicons.min.css',
                'resources/assets/js/adminlte.js', 
                // 'resources/assets/js/OverlayScrollbars.min.js', 
                // 'resources/assets/js/bootstrap.bundle.min.js', 
                // 'resources/assets/js/jquery-3-6-0.min.js',
                'resources/css/app.css', 
                'resources/js/app.js'
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            }
        }),
    ],
   
});
