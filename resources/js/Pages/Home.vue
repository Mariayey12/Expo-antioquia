<template>
    <div>
      <h1>Bienvenido a mi SPA con Laravel y Vue!</h1>

      <!-- Muestra los datos obtenidos de la API -->
      <ul v-if="datos && datos.length > 0">
        <li v-for="(dato, index) in datos" :key="index">
          {{ dato.nombre }} - {{ dato.descripcion }}
        </li>
      </ul>

      <p v-else>No se encontraron datos.</p>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    name: 'Home',
    data() {
      return {
        datos: null, // Almacena los datos obtenidos de la API
      };
    },
    mounted() {
      // Llama a la API al montar el componente
      axios
        .get('https://expo-antioquia-79bc482a1286.herokuapp.com/api/places', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`, // Incluye el token si es necesario
          },
        })
        .then((response) => {
          console.log('Respuesta de la API:', response.data); // Verifica los datos recibidos
          this.datos = response.data; // Guarda los datos en la variable `datos`
        })
        .catch((error) => {
          console.error('Error al obtener los datos:', error); // Muestra errores en la consola
        });
    },
  };
  </script>

