import Alpine from "alpinejs";
import router from "@shaun/alpinejs-router";
window.Alpine = Alpine;
Alpine.plugin(router);
Alpine.data("site", () => ({
	subpage: null,
	subpagedata: null,
	modalOpen: false,
	modalContent: null,
	init() {
		let pathname = window.location.pathname;
		let paths = pathname.split("/");
		if (paths.length > 1 && paths[1]) {
			if (paths.length > 2) {
				this.subpage = paths[2];
			} else {
				this.subpage = paths[1];
			}
			this.loadPage(window.location.href);
		} else {
			this.closePage();
		}
		var _this = this;
		window.addEventListener("popstate", async function () {
			let pathname = window.location.pathname;
			let paths = pathname.split("/");
			if (paths.length > 1 && paths[1]) {
				if (paths.length > 2) {
					_this.subpage = paths[2];
				} else {
					_this.subpage = paths[1];
				}
				_this.loadPage(window.location.href);
			} else {
				_this.closePage();
			}
		});
	},
	updateMap() {
		this.loadPage(this.$router.path + "?nodes=" + this.$router.query.c);
	},
	async loadPage(uid, asModal = false) {
		let page = await fetch(uid, {
			headers: {
				"X-Requested-With": "fetch",
			},
		});
		let html = await page.text();
		if (asModal) {
			this.modalContent = html;
			this.modalOpen = true;
			console.log("asModal", this.modalContent, this.modalOpen);
		} else {
			this.subpage = uid;
			this.subpagedata = html;
			try {
				let tempEl = document.createElement("div");
				tempEl.innerHTML = this.subpagedata;
				let title = tempEl.querySelector("[data-title]").dataset.title;
				tempEl.remove();
				document.title = title + " - Datacraft";
			} catch {
				document.title = "Datacraft";
			}
			let subpage = document.querySelector("#subpage");
			subpage.scrollTop = 0;
		}
	},
	closePage() {
		this.subpage = "home";
		this.subpagedata = null;
		this.$router.push("/");
	},
	async closeModal() {
		this.modalOpen = false;
		this.modalContent = null;
		this.$router.push("/map");
	},
}));

Alpine.start();
