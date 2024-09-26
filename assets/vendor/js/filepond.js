export const filepond = () => {
	$(function () {
		// Register plugin
		$.fn.filepond.registerPlugin(FilePondPluginImagePreview);

		// Dapatkan URL action form
		let formAction = $("form[role='form']").attr("action");
		// console.log("Form action URL:", formAction);

		// Dapatkan tipe file yang diizinkan dari atribut 'accept'
		let allowedTypes = $('input[type="file"]').attr("accept");
		// console.log("Allowed file types:", allowedTypes);

		// Convert allowed types to FilePond format
		let acceptedFileTypes = allowedTypes.split(",").map((type) => type.trim());
		// console.log("Accepted FilePond types:", acceptedFileTypes);

		// Inisialisasi FilePond
		$('input[type="file"]').filepond({
			server: {
				process: formAction, // Menggunakan URL action form
			},
			acceptedFileTypes: acceptedFileTypes, // Tipe file yang diizinkan diambil dari atribut accept
			onerror: (error) => {
				// console.error("File upload error:", error);
			},
		});

		// Optional: Set allowMultiple property to false for all file inputs
		$('input[type="file"]').filepond("allowMultiple", false);

		// Listen for addfile event untuk memvalidasi tipe file
		$('input[type="file"]').on("FilePond:addfile", function (e) {
			let fileType = e.file.fileType;
			// console.log("File added event:", e);

			// Cek apakah file yang dipilih sesuai dengan tipe yang diizinkan
			if (!acceptedFileTypes.includes(fileType)) {
				// Jika file tidak valid, hapus file dan berikan pesan error
				e.preventDefault();
				alert(
					`File yang dipilih tidak diizinkan. Hanya tipe file berikut yang diizinkan: ${acceptedFileTypes.join(
						", "
					)}`
				);
				$(this).filepond("removeFile", e.file.id);
				return;
			}

			// console.log("File type is valid:", fileType);
		});

		// Listen for processfile event
		$('input[type="file"]').on("FilePond:processfile", function (e, file) {
			// console.log("File successfully uploaded:", file);
		});
	});
};
