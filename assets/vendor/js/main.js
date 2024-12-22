import { openNav } from "./dashboard/openNavbar.js";
import { toggleDropdown } from "./dashboard/dropdown.js";
import { toggleProfileMenu } from "./dashboard/toggleProfile.js";
import { requiredLabel } from "./form/requiredLabel.js";
import { fileUpload } from "./form/file-upload.js";
import { selectCustomDateRange } from "./form/select-custom-date-form.js";
import { profileTab } from "./dashboard/profile-tab.js";
import { GropSelectOption, SlimSelectOption } from "./plugin/slim-select.js";
import { pickdate } from "../plugin/jquery/datepicker/js/jquery-datepicker.js";
import { quillTextEditor } from "./plugin/quill.js";

// global initiate
window.openNav = openNav;
window.toggleDropdown = toggleDropdown;
window.toggleProfileMenu = toggleProfileMenu;
window.requiredLabel = requiredLabel;
window.fileUpload = fileUpload;
window.selectCustomDateRange = selectCustomDateRange;
window.profileTab = profileTab;
window.SlimSelectOption = SlimSelectOption;
window.GropSelectOption = GropSelectOption;
window.pickdate = pickdate;
window.quillTextEditor = quillTextEditor;

window.addEventListener("load", function () {
	console.log("Main.js loaded");

	// Inisiasi file upload
	document.querySelectorAll(".file-upload-container").forEach((container) => {
		try {
			if (typeof fileUpload === "function") {
				fileUpload(container);
			} else {
				console.warn("fileUpload tidak terdefinisi.");
			}
		} catch (error) {
			console.error("Error saat menjalankan fileUpload:", error);
		}
	});

	// Inisiasi Slim Select
	if (typeof SlimSelectOption === "function") {
		const selector = document.querySelectorAll('select[data-search="true"]');
		if (selector.length > 0) {
			console.log("select ditemukan, menjalankan SlimSelectOption.");
			try {
				SlimSelectOption();
			} catch (error) {
				console.error("Error saat menjalankan SlimSelectOption:", error);
			}
		} else {
			console.warn("Tidak ada elemen select ditemukan.");
		}
	} else {
		console.warn("SlimSelectOption tidak terdefinisi.");
	}
	// Inisiasi group Select
	if (typeof GropSelectOption === "function") {
		const selector = document.querySelectorAll('select[group-search="true"]');
		if (selector.length > 0) {
			console.log("select ditemukan, menjalankan GropSelectOption.");
			try {
				GropSelectOption();
			} catch (error) {
				console.error("Error saat menjalankan GropSelectOption:", error);
			}
		} else {
			console.warn("Tidak ada elemen select ditemukan.");
		}
	} else {
		console.warn("GropSelectOption tidak terdefinisi.");
	}

	// Inisiasi date picker
	if (typeof pickdate === "function") {
		const selector = document.querySelectorAll(".pickdate");
		if (selector.length > 0) {
			console.log("datepicker ditemukan, menjalankan pickdate.");
			try {
				pickdate();
			} catch (error) {
				console.error("Error saat menjalankan pickdate:", error);
			}
		} else {
			console.warn("Tidak ada elemen datepicker ditemukan.");
		}
	} else {
		console.warn("pickdate tidak terdefinisi.");
	}

	// Inisiasi text editor
	try {
		if (typeof quillTextEditor === "function") {
			quillTextEditor();
		} else {
			console.warn("quillTextEditor tidak terdefinisi.");
		}
	} catch (error) {
		console.error("Error saat menjalankan quillTextEditor:", error);
	}

	// Inisiasi select custom date range
	try {
		if (typeof selectCustomDateRange === "function") {
			selectCustomDateRange();
		} else {
			console.warn("selectCustomDateRange tidak terdefinisi.");
		}
	} catch (error) {
		console.error("Error saat menjalankan selectCustomDateRange:", error);
	}

	// Inisiasi required label
	try {
		if (typeof requiredLabel === "function") {
			requiredLabel();
		} else {
			console.warn("requiredLabel tidak terdefinisi.");
		}
	} catch (error) {
		console.error("Error saat menjalankan requiredLabel:", error);
	}

	// Inisiasi profile tab
	try {
		if (typeof profileTab === "function") {
			const tabBiodata = document.querySelector(".tab-biodata");
			const tabPassword = document.querySelector(".tab-password");
			const contentBiodata = document.querySelector(".content-biodata");
			const contentPassword = document.querySelector(".content-password");
			if (tabBiodata && tabPassword && contentBiodata && contentPassword) {
				console.log("profile ditemukan, menjalankan profileTab.");
				profileTab();
			} else {
				console.warn("Elemen profile tab tidak ditemukan.");
			}
		} else {
			console.warn("profileTab tidak terdefinisi.");
		}
	} catch (error) {
		console.error("Error saat menjalankan profileTab:", error);
	}
});
