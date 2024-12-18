declare module 'ziggy' {
    interface Route {
        uri: string;
        methods: string[];
    }

    export const Ziggy: {
        [key: string]: Route;
    };
}
