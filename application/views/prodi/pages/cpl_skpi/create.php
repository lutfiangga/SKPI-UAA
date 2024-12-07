<div class=" bg-[#fafafa] w-full mx-auto p-4">

	<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
		Tambah CPL SKPI
		<div class="bg-blue-600 p-2 sm:p-3 text-[#fafafa] rounded-lg ml-2 sm:ml-4">
			<i data-feather="activity" class="w-4 h-4"></i>
		</div>
	</h3>
	<div class="divider border-gray-400"></div>
	<form method="post" action="<?= site_url('Prodi/Cpl_skpi/save'); ?>" enctype="multipart/form-data" role="form">
		<?= csrf(); ?>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
			<div class="mb-4">
				<label for="prodi" class="block text-sm font-medium text-gray-700 mb-2">Program Studi:</label>
				<select id="prodi" required name="id_prodi" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
					<option value="" selected disabled>--Pilih Program Studi--</option>
					<?php foreach ($prodi as $r) { ?>
						<option value="<?= $r['id_prodi'] ?>"><?= $r['id_prodi'] . ' | ' . $r['prodi']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="mb-4">
				<label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Bidang CPL:</label>
				<select id="kategori" required name="id_kategori_cpl" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
					<option value="" selected disabled>--Pilih Bidang CPL--</option>
					<?php foreach ($cpl as $r) { ?>
						<option value="<?= $r['id_kategori_cpl'] ?>"><?= $r['kategori']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div id="items-container" class="mb-4 space-y-2 w-full">
			<!-- Default Item Row -->
			<div class="flex items-center gap-x-2 w-full">
				<div class="flex-grow">
					<label for="konten" class="block text-sm font-medium text-gray-700 mb-2">
						Capaian Pembelajaran:
					</label>
					<textarea
						id="konten"
						name="konten[]"
						rows="2"
						class="mt-1 block w-full border border-gray-300 text-gray-800 bg-[#fafafa] rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Tata Nilai"></textarea>
				</div>
				<button
					type="button"
					class="btn mt-2 submit-button bg-red-500 text-white hover:bg-red-600 border-none rounded-md px-4 py-2"
					onclick="deleteItem(this)">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M19 7L5 7M10 11V17M14 11V17M4 7H20M6 7L7 19C7 20.1046 7.89543 21 9 21H15C16.1046 21 17 20.1046 17 19L18 7M9 3H15C16.1046 3 17 3.89543 17 5H7C7 3.89543 7.89543 3 9 3Z" />
					</svg>
					<span class="hidden md:block">Delete</span>
				</button>
			</div>
		</div>
		<!-- Add Item Button -->
		<button type="button" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 w-full md:col-span-2" onclick="addItem()">
			Add Item
		</button>

		<div class="divider border-gray-400"></div>
		<div class="relative flex justify-end gap-4">
			<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 mb-4"
				onclick="window.location.href='<?= site_url('Prodi/Cpl_skpi'); ?>';">Close</button>
			<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 mb-4">Submit</button>
		</div>
	</form>
</div>
<script>
	// Fungsi untuk menambahkan item baru
	function addItem() {
		const container = document.getElementById('items-container');

		// Template untuk row item
		const newItem = `
          <div class="flex items-center gap-x-2 w-full">
				<div class="flex-grow">
					<label for="konten" class="block text-sm font-medium text-gray-700 mb-2">
						Capaian Pembelajaran:
					</label>
					<textarea
						id="konten"
						name="konten[]"
						rows="2"
						class="mt-1 block w-full border border-gray-300 text-gray-800 bg-[#fafafa] rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Tata Nilai"></textarea>
				</div>
				<button
					type="button"
					class="btn mt-2 submit-button bg-red-500 text-white hover:bg-red-600 border-none rounded-md px-4 py-2"
					onclick="deleteItem(this)">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M19 7L5 7M10 11V17M14 11V17M4 7H20M6 7L7 19C7 20.1046 7.89543 21 9 21H15C16.1046 21 17 20.1046 17 19L18 7M9 3H15C16.1046 3 17 3.89543 17 5H7C7 3.89543 7.89543 3 9 3Z" />
					</svg>
					<span class="hidden md:block">Delete</span>
				</button>
			</div>
        `;

		// Menambahkan item baru ke container
		container.insertAdjacentHTML('beforeend', newItem);
	}

	// Fungsi untuk menghapus item
	function deleteItem(button) {
		const row = button.closest('.flex');
		const container = document.getElementById('items-container');

		// Hapus hanya jika ada lebih dari satu item
		if (container.childElementCount > 1) {
			row.remove();
		} else {
			alert("Minimal harus ada satu item.");
		}
	}
</script>
