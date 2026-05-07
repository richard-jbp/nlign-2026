/**
 * Vite config — emits a hashed bundle into /assets/dist and a manifest.json
 * which PHP reads in inc/enqueue.php to resolve cache-busted URLs.
 */
import { defineConfig } from "vite";
import { resolve } from "node:path";

export default defineConfig(({ mode }) => ({
	root: resolve(__dirname, "assets"),
	base: "/wp-content/themes/nlign-2026/assets/dist/",
	build: {
		outDir:  resolve(__dirname, "assets/dist"),
		emptyOutDir: false, // Cowork sandbox restricts rm on previously-created files; rely on hash to bust cache.
		manifest: true,
		assetsDir: "",
		sourcemap: mode !== "production",
		cssCodeSplit: false,
		rollupOptions: {
			input: resolve(__dirname, "assets/js/main.js"),
			output: {
				entryFileNames: "main.[hash].js",
				chunkFileNames: "[name].[hash].js",
				assetFileNames: ({ name }) => {
					if (name && /\.css$/.test(name))            return "main.[hash].css";
					if (name && /\.(woff2?|ttf)$/.test(name))   return "fonts/[name][extname]";
					if (name && /\.(png|jpe?g|webp|avif|svg)$/.test(name))
						return "img/[name].[hash][extname]";
					return "[name].[hash][extname]";
				},
			},
		},
	},
	server: {
		host: "localhost",
		port: 5173,
		strictPort: true,
		cors: true,
	},
	css: {
		devSourcemap: true,
	},
}));
