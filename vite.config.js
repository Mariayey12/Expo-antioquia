import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'], // Archivos de entrada para Vite
      refresh: true, // Recarga automática en desarrollo
    }),
    vue(), // Soporte para Vue.js
  ],
  build: {
    manifest: true, // Genera el archivo manifest.json
    outDir: 'public/build', // Asegura que los archivos se generen en 'public/build'
    emptyOutDir: true, // Limpia la carpeta antes de construir
    assetsDir: 'assets', // Archivos estáticos en la carpeta 'assets'
    base: '/', // Ruta base de los archivos
  },
});
