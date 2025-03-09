import { defineConfig } from 'vite';
import laravel from 'vite-plugin-laravel';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    laravel(),
  ],
});
