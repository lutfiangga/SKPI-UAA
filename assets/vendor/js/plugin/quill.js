export const quillTextEditor = () => {
	let toolbarOptions = [
		[{ font: [] }, { size: [] }],
		["bold", "italic", "underline", "strike"],
		[{ color: [] }, { background: [] }],
		[{ script: "sub" }, { script: "super" }],
		[{ header: [1, 2, 3, false] }],
		[{ list: "ordered" }, { list: "bullet" }],
		[{ align: [] }],
		["link", "image"],
		["clean"], // This button clears all content
	];

	// Initialize Quill with custom toolbar and image resize module
	let quill = new Quill(".quill-editor", {
		theme: "snow",
		modules: {
			toolbar: toolbarOptions,
			imageResize: {
				displayStyles: {
					backgroundColor: "black",
					border: "none",
					color: "white",
				},
				modules: ["Resize", "DisplaySize"],
			},
		},
	});

	// Sync Quill content with textarea and display in real-time
	const editorTextArea = document.querySelector(".editor-quill");
	const outputContent = document.querySelector(".output-content");

	quill.on("text-change", () => {
		const htmlContent = quill.root.innerHTML;
		editorTextArea.value = htmlContent; 
		outputContent.innerHTML = htmlContent; 
	});
};
