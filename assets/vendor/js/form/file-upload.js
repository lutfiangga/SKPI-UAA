export const fileUpload = (container) => {
	const fInput = container.querySelector(".file-input");
	const dropZone = container.querySelector(".drop-zone");
	const pBar = container.querySelector(".progress-bar");
	const pText = container.querySelector(".progress-text");
	const fName = container.querySelector(".file-name");
	const modal = container.querySelector(".modal");
	const cModal = container.querySelector(".close-modal");
	const uImage = container.querySelector(".modal-content");
	const pContainer = container.querySelector(".preview-container");
	const cBtn = container.querySelector(".clear-btn");

	const maxSize = 5 * 1024 * 1024; // 5 MB

	// Drag and Drop functionality
	dropZone.addEventListener("dragover", (event) => {
		event.preventDefault();
		event.dataTransfer.dropEffect = "copy"; // Show the copy cursor
		dropZone.classList.add("drag-over");
	});

	dropZone.addEventListener("dragleave", () => {
		dropZone.classList.remove("drag-over");
	});

	dropZone.addEventListener("drop", (event) => {
		event.preventDefault();
		dropZone.classList.remove("drag-over");
		const file = event.dataTransfer.files[0];
		handleFileUpload(file);
	});

	dropZone.addEventListener("click", () => {
		fInput.click();
	});

	fInput.addEventListener("change", (event) => {
		const file = event.target.files[0];
		handleFileUpload(file);
	});

	const handleFileUpload = (file) => {
		const validFileTypes = [
			"image/jpeg",
			"image/png",
			"image/gif",
			"image/webp",
			"application/pdf",
			"application/msword",
			"application/vnd.openxmlformats-officedocument.wordprocessingml.document",
			"text/rtf",
			"video/mp4",
			"video/x-msvideo",
			"video/x-flv",
			"video/x-matroska",
		];
		if (file) {
			// Check file size
			if (file.size > maxSize) {
				alert("File size exceeds the maximum limit of 5 MB.");
				fInput.value = "";
				return;
			}

			// Validate file type
			if (validFileTypes.some((type) => file.type.startsWith(type))) {
				const reader = new FileReader();

				reader.onloadstart = () => {
					pBar.style.width = "0%";
					pText.style.display = "block";
					pText.innerText = "0%";
					pContainer.style.display = "none";
					cBtn.style.display = "none";
					pContainer.classList.remove("mt-4");
				};

				reader.onprogress = (event) => {
					if (event.lengthComputable) {
						const progress = (event.loaded / event.total) * 100;
						pBar.style.width = `${progress}%`;
						pText.innerText = `${Math.round(progress)}%`;
					}
				};

				reader.onload = () => {
					const uploadTime = 4000;
					const interval = 50;
					const steps = uploadTime / interval;
					let currentStep = 0;

					const updateProgress = () => {
						const progress = (currentStep / steps) * 100;
						pBar.style.width = `${progress}%`;
						pText.innerText = `${Math.round(progress)}%`;
						currentStep++;

						if (currentStep <= steps) {
							setTimeout(updateProgress, interval);
						} else {
							pBar.style.width = "100%";
							pText.innerText = "100%";
							fName.innerText = `File Name: ${file.name} (Size: ${(
								file.size /
								(1024 * 1024)
							).toFixed(2)} MB)`;

							if (file.type.startsWith("image/")) {
								pContainer.innerHTML = `<img src="${reader.result}" alt="Preview" class="max-w-full max-h-40 cursor-pointer preview-image">`;
							} else if (file.type === "application/pdf") {
								pContainer.innerHTML = `<embed src="${reader.result}" type="application/pdf" width="100%" height="500px" />`;
							} else if (
								file.type ===
								"application/vnd.openxmlformats-officedocument.wordprocessingml.document"
							) {
								pContainer.innerHTML = `<p class="text-sm">DOCX File Selected: ${file.name}</p>`;
							}

							pContainer.style.display = "block";
							cBtn.style.display = "block";
							pContainer.classList.add("mt-4");
						}
					};

					setTimeout(updateProgress, interval);
				};

				reader.readAsDataURL(file);
			} else {
				alert("Please select a valid image, PDF, or DOCX file.");
				fInput.value = "";
			}
		}
	};

	pContainer.addEventListener("click", () => {
		modal.classList.remove("hidden");
		uImage.src = container.querySelector(".preview-image")?.src || "";
	});

	cModal.addEventListener("click", () => {
		modal.classList.add("hidden");
	});

	cBtn.addEventListener("click", () => {
		fInput.value = "";
		pBar.style.width = "0%";
		pText.style.display = "none";
		fName.innerText = "";
		pContainer.style.display = "none";
		cBtn.style.display = "none";
		pContainer.classList.remove("mt-4");
	});

	window.addEventListener("click", (event) => {
		if (event.target === modal) {
			modal.classList.add("hidden");
		}
	});
};
