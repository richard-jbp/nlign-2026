/**
 * Reveal-on-scroll using IntersectionObserver.
 *
 * Markup: any element with data-reveal becomes opacity:0 + translateY(16px),
 * then animates in when ~10% of it is visible.
 *
 *   <div class="metric" data-reveal>…</div>
 *
 * Honour prefers-reduced-motion: if set, elements appear immediately.
 */

export function initRevealOnScroll() {
	const items = document.querySelectorAll("[data-reveal]");
	if (items.length === 0) return;

	const reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

	if (reduce || !("IntersectionObserver" in window)) {
		items.forEach((el) => el.classList.add("is-revealed"));
		return;
	}

	const io = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting) {
					entry.target.classList.add("is-revealed");
					io.unobserve(entry.target);
				}
			});
		},
		{ rootMargin: "0px 0px -10% 0px", threshold: 0.1 }
	);

	items.forEach((el) => io.observe(el));
}
