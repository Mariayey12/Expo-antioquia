// Archivo: generated.d.ts

declare namespace AppRoutes {
    interface Route {
      uri: string;
      methods: string[];
      domain?: string;
    }

    interface Routes {
      [key: string]: Route;
    }
  }

  declare module '@ziggyjs/routes' {
    export const Ziggy: AppRoutes.Routes;
  }
