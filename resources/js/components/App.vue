<template>
    <div class="home">
      <h1>Bienvenido a la página de inicio</h1>
      <p>Esta es la página principal de tu aplicación Vue.js.</p>
      <p v-if="mensaje">{{ mensaje }}</p> <!-- Este es el mensaje dinámico -->
      <button @click="mostrarMensaje">Mostrar Mensaje</button>
    </div>
  </template>

  <script>
  export default {
    name: 'Home',
    data() {
      return {
        mensaje: '',  // Definimos una propiedad para el mensaje
      };
    },
    methods: {
      mostrarMensaje() {
        this.mensaje = '¡Hola, has mostrado un mensaje en la pantalla!';
      },
    },
  };
  </script>

  <style scoped>
  .home {
    padding: 2rem;
  }

  h1 {
    color: #333;
  }
  </style>

