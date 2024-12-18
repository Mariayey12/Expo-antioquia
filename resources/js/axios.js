import axios from 'axios';

// Establecer la URL base de tu API
axios.defaults.baseURL = 'https://expo-antioquia-79bc482a1286.herokuapp.com/api';

// Configurar el token si existe
const token = localStorage.getItem('token');
if (token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

// Configurar un interceptor de respuesta para manejar errores globales
axios.interceptors.response.use(
    response => response,
    error => {
        // Manejo de errores de respuesta
        if (error.response) {
            console.error('Error en la respuesta del servidor:', error.response);
        } else if (error.request) {
            console.error('No se recibió respuesta del servidor:', error.request);
        } else {
            console.error('Error al configurar la solicitud:', error.message);
        }
        return Promise.reject(error);  // Rechaza la promesa para manejar errores localmente
    }
);

export default axios;
