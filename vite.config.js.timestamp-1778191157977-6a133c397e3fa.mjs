// vite.config.js
import { defineConfig } from "file:///sessions/focused-gallant-carson/mnt/NLign%20Analytics/nlign-2026/node_modules/vite/dist/node/index.js";
import { resolve } from "node:path";
var __vite_injected_original_dirname = "/sessions/focused-gallant-carson/mnt/NLign Analytics/nlign-2026";
var vite_config_default = defineConfig(({ mode }) => ({
  root: resolve(__vite_injected_original_dirname, "assets"),
  base: "/wp-content/themes/nlign-2026/assets/dist/",
  build: {
    outDir: resolve(__vite_injected_original_dirname, "assets/dist"),
    emptyOutDir: false,
    // Cowork sandbox restricts rm on previously-created files; rely on hash to bust cache.
    manifest: true,
    assetsDir: "",
    sourcemap: mode !== "production",
    cssCodeSplit: false,
    rollupOptions: {
      input: resolve(__vite_injected_original_dirname, "assets/js/main.js"),
      output: {
        entryFileNames: "main.[hash].js",
        chunkFileNames: "[name].[hash].js",
        assetFileNames: ({ name }) => {
          if (name && /\.css$/.test(name)) return "main.[hash].css";
          if (name && /\.(woff2?|ttf)$/.test(name)) return "fonts/[name][extname]";
          if (name && /\.(png|jpe?g|webp|avif|svg)$/.test(name))
            return "img/[name].[hash][extname]";
          return "[name].[hash][extname]";
        }
      }
    }
  },
  server: {
    host: "localhost",
    port: 5173,
    strictPort: true,
    cors: true
  },
  css: {
    devSourcemap: true
  }
}));
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCIvc2Vzc2lvbnMvZm9jdXNlZC1nYWxsYW50LWNhcnNvbi9tbnQvTkxpZ24gQW5hbHl0aWNzL25saWduLTIwMjZcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfZmlsZW5hbWUgPSBcIi9zZXNzaW9ucy9mb2N1c2VkLWdhbGxhbnQtY2Fyc29uL21udC9OTGlnbiBBbmFseXRpY3MvbmxpZ24tMjAyNi92aXRlLmNvbmZpZy5qc1wiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9pbXBvcnRfbWV0YV91cmwgPSBcImZpbGU6Ly8vc2Vzc2lvbnMvZm9jdXNlZC1nYWxsYW50LWNhcnNvbi9tbnQvTkxpZ24lMjBBbmFseXRpY3MvbmxpZ24tMjAyNi92aXRlLmNvbmZpZy5qc1wiOy8qKlxuICogVml0ZSBjb25maWcgXHUyMDE0IGVtaXRzIGEgaGFzaGVkIGJ1bmRsZSBpbnRvIC9hc3NldHMvZGlzdCBhbmQgYSBtYW5pZmVzdC5qc29uXG4gKiB3aGljaCBQSFAgcmVhZHMgaW4gaW5jL2VucXVldWUucGhwIHRvIHJlc29sdmUgY2FjaGUtYnVzdGVkIFVSTHMuXG4gKi9cbmltcG9ydCB7IGRlZmluZUNvbmZpZyB9IGZyb20gXCJ2aXRlXCI7XG5pbXBvcnQgeyByZXNvbHZlIH0gZnJvbSBcIm5vZGU6cGF0aFwiO1xuXG5leHBvcnQgZGVmYXVsdCBkZWZpbmVDb25maWcoKHsgbW9kZSB9KSA9PiAoe1xuXHRyb290OiByZXNvbHZlKF9fZGlybmFtZSwgXCJhc3NldHNcIiksXG5cdGJhc2U6IFwiL3dwLWNvbnRlbnQvdGhlbWVzL25saWduLTIwMjYvYXNzZXRzL2Rpc3QvXCIsXG5cdGJ1aWxkOiB7XG5cdFx0b3V0RGlyOiAgcmVzb2x2ZShfX2Rpcm5hbWUsIFwiYXNzZXRzL2Rpc3RcIiksXG5cdFx0ZW1wdHlPdXREaXI6IGZhbHNlLCAvLyBDb3dvcmsgc2FuZGJveCByZXN0cmljdHMgcm0gb24gcHJldmlvdXNseS1jcmVhdGVkIGZpbGVzOyByZWx5IG9uIGhhc2ggdG8gYnVzdCBjYWNoZS5cblx0XHRtYW5pZmVzdDogdHJ1ZSxcblx0XHRhc3NldHNEaXI6IFwiXCIsXG5cdFx0c291cmNlbWFwOiBtb2RlICE9PSBcInByb2R1Y3Rpb25cIixcblx0XHRjc3NDb2RlU3BsaXQ6IGZhbHNlLFxuXHRcdHJvbGx1cE9wdGlvbnM6IHtcblx0XHRcdGlucHV0OiByZXNvbHZlKF9fZGlybmFtZSwgXCJhc3NldHMvanMvbWFpbi5qc1wiKSxcblx0XHRcdG91dHB1dDoge1xuXHRcdFx0XHRlbnRyeUZpbGVOYW1lczogXCJtYWluLltoYXNoXS5qc1wiLFxuXHRcdFx0XHRjaHVua0ZpbGVOYW1lczogXCJbbmFtZV0uW2hhc2hdLmpzXCIsXG5cdFx0XHRcdGFzc2V0RmlsZU5hbWVzOiAoeyBuYW1lIH0pID0+IHtcblx0XHRcdFx0XHRpZiAobmFtZSAmJiAvXFwuY3NzJC8udGVzdChuYW1lKSkgICAgICAgICAgICByZXR1cm4gXCJtYWluLltoYXNoXS5jc3NcIjtcblx0XHRcdFx0XHRpZiAobmFtZSAmJiAvXFwuKHdvZmYyP3x0dGYpJC8udGVzdChuYW1lKSkgICByZXR1cm4gXCJmb250cy9bbmFtZV1bZXh0bmFtZV1cIjtcblx0XHRcdFx0XHRpZiAobmFtZSAmJiAvXFwuKHBuZ3xqcGU/Z3x3ZWJwfGF2aWZ8c3ZnKSQvLnRlc3QobmFtZSkpXG5cdFx0XHRcdFx0XHRyZXR1cm4gXCJpbWcvW25hbWVdLltoYXNoXVtleHRuYW1lXVwiO1xuXHRcdFx0XHRcdHJldHVybiBcIltuYW1lXS5baGFzaF1bZXh0bmFtZV1cIjtcblx0XHRcdFx0fSxcblx0XHRcdH0sXG5cdFx0fSxcblx0fSxcblx0c2VydmVyOiB7XG5cdFx0aG9zdDogXCJsb2NhbGhvc3RcIixcblx0XHRwb3J0OiA1MTczLFxuXHRcdHN0cmljdFBvcnQ6IHRydWUsXG5cdFx0Y29yczogdHJ1ZSxcblx0fSxcblx0Y3NzOiB7XG5cdFx0ZGV2U291cmNlbWFwOiB0cnVlLFxuXHR9LFxufSkpO1xuIl0sCiAgIm1hcHBpbmdzIjogIjtBQUlBLFNBQVMsb0JBQW9CO0FBQzdCLFNBQVMsZUFBZTtBQUx4QixJQUFNLG1DQUFtQztBQU96QyxJQUFPLHNCQUFRLGFBQWEsQ0FBQyxFQUFFLEtBQUssT0FBTztBQUFBLEVBQzFDLE1BQU0sUUFBUSxrQ0FBVyxRQUFRO0FBQUEsRUFDakMsTUFBTTtBQUFBLEVBQ04sT0FBTztBQUFBLElBQ04sUUFBUyxRQUFRLGtDQUFXLGFBQWE7QUFBQSxJQUN6QyxhQUFhO0FBQUE7QUFBQSxJQUNiLFVBQVU7QUFBQSxJQUNWLFdBQVc7QUFBQSxJQUNYLFdBQVcsU0FBUztBQUFBLElBQ3BCLGNBQWM7QUFBQSxJQUNkLGVBQWU7QUFBQSxNQUNkLE9BQU8sUUFBUSxrQ0FBVyxtQkFBbUI7QUFBQSxNQUM3QyxRQUFRO0FBQUEsUUFDUCxnQkFBZ0I7QUFBQSxRQUNoQixnQkFBZ0I7QUFBQSxRQUNoQixnQkFBZ0IsQ0FBQyxFQUFFLEtBQUssTUFBTTtBQUM3QixjQUFJLFFBQVEsU0FBUyxLQUFLLElBQUksRUFBYyxRQUFPO0FBQ25ELGNBQUksUUFBUSxrQkFBa0IsS0FBSyxJQUFJLEVBQUssUUFBTztBQUNuRCxjQUFJLFFBQVEsK0JBQStCLEtBQUssSUFBSTtBQUNuRCxtQkFBTztBQUNSLGlCQUFPO0FBQUEsUUFDUjtBQUFBLE1BQ0Q7QUFBQSxJQUNEO0FBQUEsRUFDRDtBQUFBLEVBQ0EsUUFBUTtBQUFBLElBQ1AsTUFBTTtBQUFBLElBQ04sTUFBTTtBQUFBLElBQ04sWUFBWTtBQUFBLElBQ1osTUFBTTtBQUFBLEVBQ1A7QUFBQSxFQUNBLEtBQUs7QUFBQSxJQUNKLGNBQWM7QUFBQSxFQUNmO0FBQ0QsRUFBRTsiLAogICJuYW1lcyI6IFtdCn0K
