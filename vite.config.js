import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/scss/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
          flowbite: "flowbite"
        }
      },
    server: {
        host: "0.0.0.0",
        hmr: {
            host: "localhost",
        },
    },
});
