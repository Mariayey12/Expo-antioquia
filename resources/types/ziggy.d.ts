// Archivo: ziggy.d.ts

declare module 'ziggy' {
    interface Route {
      uri: string;
      methods: string[];
      domain?: string; // Opcional, si las rutas manejan múltiples dominios.
    }

    export const Ziggy: {
      [key: string]: Route;
    };
  }
