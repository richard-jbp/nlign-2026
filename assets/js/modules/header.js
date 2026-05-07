/**
 * Header behaviours:
 *   - Adds .is-scrolled when the page has scrolled past 4px (border + bg shift).
 *   - Mobile drawer toggle with focus management and Escape close.
 */

export function initHeader() {
	const header  = document.querySelector(".site-header");
	const toggle  = document.querySelector(".mobile-toggle");
	const drawer  = document.querySelector(".mobile-drawer");
	if (!header) return;

	// Scroll-aware header.
	const onScroll = () => {
		header.classList.toggle("is-scrolled", window.scrollY > 4);
	};
	onScroll();
	window.addEventListener("scroll", onScroll, { passive: true });

	if (!toggle || !drawer) return;

	const setOpen = (open) => {
		toggle.setAttribute("aria-expanded", String(open));
		drawer.classList.toggle("is-open", open);
		document.documentElement.style.overflow = open ? "hidden" : "";
		if (open) {
			drawer.querySelector("a, button")?.focus();
		} else {
			toggle.focus();
		}
	};

	toggle.addEventListener("click", () => {
		const isOpen = toggle.getAttribute("aria-expanded") === "true";
		setOpen(!isOpen);
	});

	// Close on Escape, on link tap, on resize past breakpoint.
	document.addEventListener("keydown", (e) => {
		if (e.key === "Escape" && drawer.classList.contains("is-open")) setOpen(false);
	});

	drawer.querySelectorAll("a").forEach((a) => {
		a.addEventListener("click", () => setOpen(false));
	});

	const mql = window.matchMedia("(min-width: 900px)");
	mql.addEventListener("change", (e) => { if (e.matches) setOpen(false); });
}
