// Archivo: types.d.ts

// Importa módulos personalizados y añade propiedades globales.

declare global {
    interface Window {
      Ziggy: any; // Añade Ziggy al objeto global `window` si se utiliza de esa forma.
    }
  }

  // Declaración de extensiones para Vue
  declare module '@vue/runtime-core' {
    interface ComponentCustomProperties {
      $route: (name: string, params?: Record<string, any>, absolute?: boolean) => string; // Método de Ziggy.
    }
  }
