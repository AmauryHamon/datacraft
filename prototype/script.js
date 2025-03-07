document.addEventListener("DOMContentLoaded", async () => {
	// Fetch or generate data
	try {
		const response = await fetch("data.json");
		let data = await response.json();
		data = addRandomPosition(data);

		const nodeContainer = document.querySelector(".nodecontainer");
		const popoverContainer = document.querySelector(".popover-container");
		data.forEach((item) => {
			const node = document.createElement("button");
			node.classList.add(
				"node",
				"absolute",
				"size-4",
				// "p-4",
				"rounded-full",
				"bg-black",
				"cursor-pointer",
				"hover:bg-red-500",
				"hover:scale-125",
				"hover:z-40",
				"transition-transform",
				"transform-gpu",
				"duration-200",
				"ease-in-out",
				"group"
			);
			node.style.top = `${item.y}%`;
			node.style.left = `${item.x}%`;
			node.setAttribute("data-id", `${item.id}`);

			const label = document.createElement("div");
			label.classList.add(
				"text-black",
				"text-xs",
				"text-left",
				"absolute",
				"-translate-y-1/2",
				"leading-[1]",
				"max-w-[25ch]",
				"scale-100"

				// "hidden",
				// "group-hover:block"
			);

			label.textContent = item.Title;
			node.appendChild(label);

			const popover = document.createElement("div");
			popover.setAttribute("id", `${item.id}`);
			// popover.setAttribute("popover", "auto");
			popover.classList.add(
				"text-left",
				"popover",
				"inset-[unset]",
				"absolute",
				"bg-white",
				"p-4",
				"shadow-lg",
				"text-black",
				"w-48",
				"border",
				"hidden",
			);
			if(item.x > 50) {
				label.style.right = "calc(100% + var(--labelOffset))";
				popover.style.right = `${100 - item.x}%`;
			} else {
				label.style.left = "calc(100% + var(--labelOffset))";
				popover.style.left = `calc(${item.x}% + var(--popOffset))`;
			}
			if(item.y > 50) {
				popover.style.bottom = `calc(${100 - item.y}% + var(--popOffset))`;
			} else {
				popover.style.top = `calc(${item.y}% + var(--popOffset))`;
			}
			popover.innerHTML = `
                <div class="font-bold">${item.Title}</div>
                <p class="text-xs">${item.Authors}</p>
                <p class="text-xs">${item.Date}</p>
                <p class="text-xs">${item.Concept}</p>
                <p class="text-xs">${item.Context}</p>

            `;
			node.appendChild(popover);

			nodeContainer.appendChild(node);
		});
	} catch (error) {
		console.log("error", error);
	} finally {
		const nodes = Array.from(document.querySelectorAll(".node"));
		let activePopover = null;

		nodes.forEach((node) => {
			const popover = document.getElementById(node.getAttribute("data-id"));
			node.addEventListener("mouseenter", (e) => {
				console.log("hi");

				const popoverID = e.target.getAttribute("data-id");
				const popover = document.getElementById(popoverID);
				activePopover = popover;

				popover.classList.remove("hidden");
			});

			node.addEventListener("mouseleave", (e) => {
				activePopover.classList.add("hidden");
				activePopover = null;  // Reset active popover
			});
		});
		popovers = Array.from(document.querySelectorAll(".popover"));
		popovers.forEach((popover) => {
			popover.addEventListener("click", (e) => {
				const mapItem = document.querySelector(".map-item");
				mapItem.classList.toggle("hidden");
			})
			popover.addEventListener("mouseenter", (e) => {
				activePopover = popover;
			});
			popover.addEventListener("mouseleave", (e) => {
				popover.classList.add("hidden");
				// activePopover.classList.add("hidden");
				activePopover = null;  // Reset active popover
			});
		})
			
	}
});

addRandomPosition = (data) => {
	return data.map((item, index) => ({
		...item,
		// x: Math.random() * 100,
		// y: Math.random() * 100,
		x: Math.random() * 100,
		y: Math.random() * 100,
		id: index,
	}));
};

// let scale = 1, offsetX = 0, offsetY = 0;
// const nodes = document.querySelector('.nodes');

// function updateTransform() {
//     nodes.style.transform = `translate(${offsetX}px, ${offsetY}px) scale(${scale})`;
// }

// window.addEventListener("wheel", (e) => {
//     const zoomFactor = e.deltaY < 0 ? 1.1 : 0.9;
//     scale *= zoomFactor;
//     updateTransform();
// });

// let isDragging = false, startX, startY;

// window.addEventListener("mousedown", (e) => {
//     isDragging = true;
//     startX = e.clientX - offsetX;
//     startY = e.clientY - offsetY;
// });

// window.addEventListener("mousemove", (e) => {
//     if (!isDragging) return;
//     offsetX = e.clientX - startX;
//     offsetY = e.clientY - startY;
//     updateTransform();
// });

// window.addEventListener("mouseup", () => isDragging = false);
