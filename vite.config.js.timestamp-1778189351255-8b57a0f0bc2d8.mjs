// vite.config.js
import { defineConfig } from "file:///sessions/focused-gallant-carson/mnt/NLign%20Analytics/nlign-2026/node_modules/vite/dist/node/index.js";
import { resolve } from "node:path";
var __vite_injected_original_dirname = "/sessions/focused-gallant-carson/mnt/NLign Analytics/nlign-2026";
var vite_config_default = defineConfig(({ mode }) => ({
  root: resolve(__vite_injected_original_dirname, "assets"),
  base: "/wp-content/themes/nlign-2026/assets/dist/",
  build: {
    outDir: resolve(__vite_injected_original_dirname, "assets/dist"),
    emptyOutDir: true,
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
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCIvc2Vzc2lvbnMvZm9jdXNlZC1nYWxsYW50LWNhcnNvbi9tbnQvTkxpZ24gQW5hbHl0aWNzL25saWduLTIwMjZcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfZmlsZW5hbWUgPSBcIi9zZXNzaW9ucy9mb2N1c2VkLWdhbGxhbnQtY2Fyc29uL21udC9OTGlnbiBBbmFseXRpY3MvbmxpZ24tMjAyNi92aXRlLmNvbmZpZy5qc1wiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9pbXBvcnRfbWV0YV91cmwgPSBcImZpbGU6Ly8vc2Vzc2lvbnMvZm9jdXNlZC1nYWxsYW50LWNhcnNvbi9tbnQvTkxpZ24lMjBBbmFseXRpY3MvbmxpZ24tMjAyNi92aXRlLmNvbmZpZy5qc1wiOy8qKlxuICogVml0ZSBjb25maWcgXHUyMDE0IGVtaXRzIGEgaGFzaGVkIGJ1bmRsZSBpbnRvIC9hc3NldHMvZGlzdCBhbmQgYSBtYW5pZmVzdC5qc29uXG4gKiB3aGljaCBQSFAgcmVhZHMgaW4gaW5jL2VucXVldWUucGhwIHRvIHJlc29sdmUgY2FjaGUtYnVzdGVkIFVSTHMuXG4gKi9cbmltcG9ydCB7IGRlZmluZUNvbmZpZyB9IGZyb20gXCJ2aXRlXCI7XG5pbXBvcnQgeyByZXNvbHZlIH0gZnJvbSBcIm5vZGU6cGF0aFwiO1xuXG5leHBvcnQgZGVmYXVsdCBkZWZpbmVDb25maWcoKHsgbW9kZSB9KSA9PiAoe1xuXHRyb290OiByZXNvbHZlKF9fZGlybmFtZSwgXCJhc3NldHNcIiksXG5cdGJhc2U6IFwiL3dwLWNvbnRlbnQvdGhlbWVzL25saWduLTIwMjYvYXNzZXRzL2Rpc3QvXCIsXG5cdGJ1aWxkOiB7XG5cdFx0b3V0RGlyOiAgcmVzb2x2ZShfX2Rpcm5hbWUsIFwiYXNzZXRzL2Rpc3RcIiksXG5cdFx0ZW1wdHlPdXREaXI6IHRydWUsXG5cdFx0bWFuaWZlc3Q6IHRydWUsXG5cdFx0YXNzZXRzRGlyOiBcIlwiLFxuXHRcdHNvdXJjZW1hcDogbW9kZSAhPT0gXCJwcm9kdWN0aW9uXCIsXG5cdFx0Y3NzQ29kZVNwbGl0OiBmYWxzZSxcblx0XHRyb2xsdXBPcHRpb25zOiB7XG5cdFx0XHRpbnB1dDogcmVzb2x2ZShfX2Rpcm5hbWUsIFwiYXNzZXRzL2pzL21haW4uanNcIiksXG5cdFx0XHRvdXRwdXQ6IHtcblx0XHRcdFx0ZW50cnlGaWxlTmFtZXM6IFwibWFpbi5baGFzaF0uanNcIixcblx0XHRcdFx0Y2h1bmtGaWxlTmFtZXM6IFwiW25hbWVdLltoYXNoXS5qc1wiLFxuXHRcdFx0XHRhc3NldEZpbGVOYW1lczogKHsgbmFtZSB9KSA9PiB7XG5cdFx0XHRcdFx0aWYgKG5hbWUgJiYgL1xcLmNzcyQvLnRlc3QobmFtZSkpICAgICAgICAgICAgcmV0dXJuIFwibWFpbi5baGFzaF0uY3NzXCI7XG5cdFx0XHRcdFx0aWYgKG5hbWUgJiYgL1xcLih3b2ZmMj98dHRmKSQvLnRlc3QobmFtZSkpICAgcmV0dXJuIFwiZm9udHMvW25hbWVdW2V4dG5hbWVdXCI7XG5cdFx0XHRcdFx0aWYgKG5hbWUgJiYgL1xcLihwbmd8anBlP2d8d2VicHxhdmlmfHN2ZykkLy50ZXN0KG5hbWUpKVxuXHRcdFx0XHRcdFx0cmV0dXJuIFwiaW1nL1tuYW1lXS5baGFzaF1bZXh0bmFtZV1cIjtcblx0XHRcdFx0XHRyZXR1cm4gXCJbbmFtZV0uW2hhc2hdW2V4dG5hbWVdXCI7XG5cdFx0XHRcdH0sXG5cdFx0XHR9LFxuXHRcdH0sXG5cdH0sXG5cdHNlcnZlcjoge1xuXHRcdGhvc3Q6IFwibG9jYWxob3N0XCIsXG5cdFx0cG9ydDogNTE3Myxcblx0XHRzdHJpY3RQb3J0OiB0cnVlLFxuXHRcdGNvcnM6IHRydWUsXG5cdH0sXG5cdGNzczoge1xuXHRcdGRldlNvdXJjZW1hcDogdHJ1ZSxcblx0fSxcbn0pKTtcbiJdLAogICJtYXBwaW5ncyI6ICI7QUFJQSxTQUFTLG9CQUFvQjtBQUM3QixTQUFTLGVBQWU7QUFMeEIsSUFBTSxtQ0FBbUM7QUFPekMsSUFBTyxzQkFBUSxhQUFhLENBQUMsRUFBRSxLQUFLLE9BQU87QUFBQSxFQUMxQyxNQUFNLFFBQVEsa0NBQVcsUUFBUTtBQUFBLEVBQ2pDLE1BQU07QUFBQSxFQUNOLE9BQU87QUFBQSxJQUNOLFFBQVMsUUFBUSxrQ0FBVyxhQUFhO0FBQUEsSUFDekMsYUFBYTtBQUFBLElBQ2IsVUFBVTtBQUFBLElBQ1YsV0FBVztBQUFBLElBQ1gsV0FBVyxTQUFTO0FBQUEsSUFDcEIsY0FBYztBQUFBLElBQ2QsZUFBZTtBQUFBLE1BQ2QsT0FBTyxRQUFRLGtDQUFXLG1CQUFtQjtBQUFBLE1BQzdDLFFBQVE7QUFBQSxRQUNQLGdCQUFnQjtBQUFBLFFBQ2hCLGdCQUFnQjtBQUFBLFFBQ2hCLGdCQUFnQixDQUFDLEVBQUUsS0FBSyxNQUFNO0FBQzdCLGNBQUksUUFBUSxTQUFTLEtBQUssSUFBSSxFQUFjLFFBQU87QUFDbkQsY0FBSSxRQUFRLGtCQUFrQixLQUFLLElBQUksRUFBSyxRQUFPO0FBQ25ELGNBQUksUUFBUSwrQkFBK0IsS0FBSyxJQUFJO0FBQ25ELG1CQUFPO0FBQ1IsaUJBQU87QUFBQSxRQUNSO0FBQUEsTUFDRDtBQUFBLElBQ0Q7QUFBQSxFQUNEO0FBQUEsRUFDQSxRQUFRO0FBQUEsSUFDUCxNQUFNO0FBQUEsSUFDTixNQUFNO0FBQUEsSUFDTixZQUFZO0FBQUEsSUFDWixNQUFNO0FBQUEsRUFDUDtBQUFBLEVBQ0EsS0FBSztBQUFBLElBQ0osY0FBYztBQUFBLEVBQ2Y7QUFDRCxFQUFFOyIsCiAgIm5hbWVzIjogW10KfQo=
