import './bootstrap';  // Carga las dependencias globales
import { createApp } from 'vue';  // Crea una instancia de Vue
import { createRouter, createWebHistory } from 'vue-router';  // Importa Vue Router
import axios from './axios';  // Asegúrate de importar axios

// Importa el componente principal de la aplicación
import App from './components/App.vue';  // Componente principal
import Home from './pages/Home.vue';  // Página principal

// Configuración de rutas
const routes = [
  {
    path: '/',        // Ruta principal
    name: 'home',
    component: Home,  // Muestra el componente Home
  },
];

// Crea el router con el historial del navegador
const router = createRouter({
  history: createWebHistory(),  // Usa el historial del navegador
  routes,                      // Usa las rutas definidas
});

// Crea la aplicación Vue
const app = createApp(App);  // Usamos App.vue como el componente raíz

// Usa el router en la aplicación
app.use(router);

// Monta la aplicación en el contenedor con id 'app'
app.mount('#app');



