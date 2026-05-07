/**
 * Solution tabs (Production / Sustainment / Quality / Fleet).
 *
 * Implements the WAI-ARIA Tabs pattern:
 *   - role="tablist", role="tab", role="tabpanel"
 *   - tab[aria-selected="true"] is the active one
 *   - Arrow keys cycle, Home / End jump to first / last
 *
 * Markup contract:
 *   <div class="solution__tabs" role="tablist">
 *     <button class="solution__tab" role="tab" aria-selected="true"
 *             aria-controls="solution-panel-production"
 *             id="solution-tab-production">Production</button>
 *     ...
 *   </div>
 *   <div id="solution-panel-production" role="tabpanel"
 *        aria-labelledby="solution-tab-production">…</div>
 */

export function initSolutionTabs() {
	const tablist = document.querySelector(".solution__tabs");
	if (!tablist) return;

	const tabs = Array.from(tablist.querySelectorAll(".solution__tab"));
	if (tabs.length === 0) return;

	const selectTab = (tab) => {
		tabs.forEach((t) => {
			const active = t === tab;
			t.setAttribute("aria-selected", String(active));
			t.setAttribute("tabindex", active ? "0" : "-1");
			const panelId = t.getAttribute("aria-controls");
			const panel   = panelId ? document.getElementById(panelId) : null;
			if (panel) panel.hidden = !active;
		});
		tab.focus();
	};

	tabs.forEach((tab) => {
		tab.addEventListener("click", () => selectTab(tab));
		tab.addEventListener("keydown", (e) => {
			const i = tabs.indexOf(tab);
			let next = null;
			if (e.key === "ArrowRight") next = tabs[(i + 1) % tabs.length];
			if (e.key === "ArrowLeft")  next = tabs[(i - 1 + tabs.length) % tabs.length];
			if (e.key === "Home")        next = tabs[0];
			if (e.key === "End")         next = tabs[tabs.length - 1];
			if (next) {
				e.preventDefault();
				selectTab(next);
			}
		});
	});
}
