
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import axios from 'axios';

// Configuración de Axios
axios.defaults.baseURL = 'https://expo-antioquia-79bc482a1286.herokuapp.com'; // URL de tu API
axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`; // Configuración del token

// Configurar manejo global de errores
axios.interceptors.response.use(
    response => response, // Si la respuesta es exitosa, la retornamos directamente
    error => {
        // Manejar errores de manera centralizada
        if (error.response) {
            console.error('Error en la respuesta:', error.response);
        } else if (error.request) {
            console.error('No se recibió respuesta:', error.request);
        } else {
            console.error('Error en la configuración de la solicitud:', error.message);
        }
        return Promise.reject(error); // Rechazamos la promesa para que el error se maneje donde se haga la solicitud
    }
);

createInertiaApp({
    resolve: name => require(`./Pages/${name}.vue`), // Rutas de tus componentes Vue
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});
