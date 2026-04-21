import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [laravel(["resources/css/app.css", "resources/js/app.js"])],
  build: {
    manifest: true,
    cssCodeSplit: true,
    sourcemap: false,
    minify: "terser",
    terserOptions: {
      compress: {
        drop_console: true,
        drop_debugger: true,
      },
    },
    rollupOptions: {
      output: {
        manualChunks: {
          vendor: ["axios", "bootstrap", "lodash"],
        },
      },
    },
  },
});
