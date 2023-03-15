import {defineConfig} from 'vite'
import DefineOptions from 'unplugin-vue-define-options/vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    server: {
        host: '0.0.0.0', hmr: {
            host: 'localhost'
        }
    }, plugins: [laravel({
        input: 'resources/js/app.js', refresh: true,
    }), vue({
        template: {
            transformAssetUrls: {
                base: null, includeAbsolute: false,
            },
        },
    }), DefineOptions()],
});
