import { showPassword } from "./form/showPassword.js";
import {
	formValidation,
	inputValidation,
	submitValidation,
} from "./form/input-form-validation.js";

// global initiate
window.showPassword = showPassword;
window.formValidation = formValidation;
window.inputValidation = inputValidation;
window.submitValidation = submitValidation;

window.addEventListener("load", function () {
	console.log("App.js loaded");

	if (typeof formValidation === "function") {
		const formElement = document.querySelector("form");
		if (formElement) {
			console.log("Form ditemukan, menjalankan formValidation.");
			try {
				formValidation();
			} catch (error) {
				console.error("Error saat menjalankan formValidation:", error);
			}
		} else {
			console.warn("Tidak ada elemen form ditemukan.");
		}
	} else {
		console.warn("formValidation tidak terdefinisi.");
	}

	// if (typeof feather !== "undefined" && feather.replace) {
	// 	const selector = document.querySelectorAll("[data-feather]");
	// 	if (selector) {
	// 		console.log("Menjalankan feather.replace()");
	// 		try {
	// 			feather.replace();
	// 		} catch (error) {
	// 			console.error("Error saat menjalankan feather.replace()::", error);
	// 		}
	// 	} else {
	// 		console.warn("Tidak ada elemen form ditemukan.");
	// 	}
	// } else {
	// 	console.warn("feather.replace(): tidak terdefinisi.");
	// }

	// Inisiasi feather icons
	if (typeof feather !== "undefined" && feather.replace) {
		console.log("running feather.replace()");
		try {
			feather.replace();
		} catch (error) {
			console.error("Error saat menjalankan feather.replace():", error);
		}
	} else {
		console.warn("Feather icons belum ter-load atau tidak ditemukan.");
	}
});
