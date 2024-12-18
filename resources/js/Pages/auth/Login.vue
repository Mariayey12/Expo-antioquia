<template>
    <div>
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

      const login = () => {
        Inertia.post('/login', form.value);
      };

      return {
        form,
        login,
      };
    },
  };
  </script>
