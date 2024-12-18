<template>
    <div id="app">
      <header>
        <nav>
          <ul>
            <li><router-link to="/">Home</router-link></li>
          </ul>
        </nav>
      </header>
      <main>
        <router-view></router-view>  <!-- Aquí se renderizan las vistas según la ruta -->
      </main>
    </div>
  </template>

  <script>
  export default {
    name: 'App',
  };
  </script>

  <style scoped>
  /* Estilos básicos */
  header {
    background-color: #333;
    color: white;
    padding: 1rem;
  }

  nav ul {
    list-style: none;
    padding: 0;
  }

  nav ul li {
    display: inline;
    margin-right: 1rem;
  }

  a {
    color: white;
    text-decoration: none;
  }
  </style>
