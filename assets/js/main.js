/**
 * NLign 2026 — main entry.
 *
 * Imports SCSS so Vite emits a sibling stylesheet (PHP loads it from manifest).
 * Each interactive concern lives in /modules and is initialised conditionally
 * so a missing root element doesn't throw.
 */

import "../scss/main.scss";

import { initHeader }       from "./modules/header.js";
import { initSolutionTabs } from "./modules/solution-tabs.js";
import { initRevealOnScroll } from "./modules/reveal.js";

const ready = (fn) =>
	document.readyState !== "loading"
		? fn()
		: document.addEventListener("DOMContentLoaded", fn, { once: true });

ready(() => {
	initHeader();
	initSolutionTabs();
	initRevealOnScroll();
});
