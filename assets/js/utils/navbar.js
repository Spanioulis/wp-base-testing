import { isVisible } from "./isVisible.js";

export function highlightTopVisibleSection() {
	console.log("Navbar!!!");
	const sections = document.querySelectorAll("section");
	const navbarLinks = document.querySelectorAll("#navbar a");
	let closestSectionIndex = -1;
	let closestSectionTop = Infinity;

	sections.forEach((section, index) => {
		if (isVisible(section)) {
			const rect = section.getBoundingClientRect();
			if (rect.top >= 0 && rect.top < closestSectionTop) {
				closestSectionTop = rect.top;
				closestSectionIndex = index;
			}
		}
	});

	// Reset all links
	navbarLinks.forEach((link) => link.classList.remove("active"));

	// Highlight the link corresponding to the topmost visible section
	if (closestSectionIndex !== -1) {
		navbarLinks[closestSectionIndex].classList.add("active");
	}
}

window.addEventListener("scroll", highlightTopVisibleSection);
