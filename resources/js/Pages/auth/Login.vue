<template>
    <div class="login-container">
      <h1>Inicia sesión</h1>
      <form @submit.prevent="login">
        <div>
          <label for="email">Correo electrónico</label>
          <input id="email" v-model="form.email" type="email" required />
        </div>
        <div>
          <label for="password">Contraseña</label>
          <input id="password" v-model="form.password" type="password" required />
        </div>
        <div v-if="error" class="error-message">
          {{ error }}
        </div>
        <button type="submit">Iniciar sesión</button>
      </form>
    </div>
  </template>

  <script>
  import { ref } from 'vue';
  import { Inertia } from '@inertiajs/inertia';

  export default {
    setup() {
      const form = ref({
        email: '',
        password: '',
      });

      const error = ref(null);

      const login = () => {
        Inertia.post('/login', form.value, {
          onError: (errors) => {
            error.value = errors.email || errors.password || 'Error al iniciar sesión.';
          },
        });
      };

      return {
        form,
        login,
        error,
      };
    },
  };
  </script>

  <style scoped>
  .login-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  .error-message {
    color: red;
    margin-top: 10px;
  }
  </style>

