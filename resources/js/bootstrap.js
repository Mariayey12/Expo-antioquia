import 'bootstrap';  // Carga los estilos y scripts de Bootstrap
import axios from 'axios';

window.axios = axios;  // Asocia axios a window para usarlo globalmente

// Configura el encabezado 'X-Requested-With' para enviar peticiones AJAX
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
