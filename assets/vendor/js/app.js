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

document.addEventListener("DOMContentLoaded", function () {

	// inisiasi form validation
	formValidation();
	
	// inisiasi feather icons
	feather.replace();
});
