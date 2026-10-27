import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));

// lets imports like 'components/button' keep working (same as Next's baseUrl: src)
const src = (p: string) => path.resolve(__dirname, 'src', p);

export default defineConfig({
  plugins: [react()],
  resolve: {
    alias: {
      components: src('components'),
      containers: src('containers'),
      contexts: src('contexts'),
      helpers: src('helpers'),
      assets: src('assets'),
      pages: src('pages'),
    },
  },
});
