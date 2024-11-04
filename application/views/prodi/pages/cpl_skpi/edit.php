<div class=" bg-[#fafafa] w-full mx-auto p-4">

	<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
		Tambah CPL SKPI
		<div class="bg-blue-600 p-2 sm:p-3 text-[#fafafa] rounded-lg ml-2 sm:ml-4">
			<i data-feather="activity" class="w-4 h-4"></i>
		</div>
	</h3>
	<div class="divider border-gray-400"></div>
	<form method="post" action="<?= site_url('Prodi/Cpl_skpi/update/') . $edit['id_cpl'] ?>" enctype="multipart/form-data" role="form">
		<?= csrf(); ?>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
			<div class="mb-4">
				<label for="prodi" class="block text-sm font-medium text-gray-700 mb-2">Program Studi:</label>
				<select id="prodi" required name="id_prodi" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
					<option value="" selected disabled>--Pilih Program Studi--</option>
					<?php foreach ($prodi->result_array() as $r) { ?>
						<option value="<?= $r['id_prodi'] ?>" <?= ($r['id_prodi'] == $edit['id_prodi']) ? 'selected' : '' ?>><?= $r['id_prodi'] . ' | ' . $r['prodi']; ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="mb-4">
				<label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Bidang CPL:</label>
				<select id="kategori" required name="kategori" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
					<option value="" selected disabled>--Pilih Bidang CPL--</option>
					<option value="Capaian Pembelajaran Bidang Sikap dan Tata Nilai" <?= ($edit['kategori'] == 'Capaian Pembelajaran Bidang Sikap dan Tata Nilai') ? 'selected' : '' ?>>
						CAPAIAN PEMBELAJARAN BIDANG SIKAP DAN TATA NILAI
					</option>
					<option value="Capaian Pembelajaran Bidang Keterampilan Umum" <?= ($edit['kategori'] == 'Capaian Pembelajaran Bidang Keterampilan Umum') ? 'selected' : '' ?>>
						CAPAIAN PEMBELAJARAN BIDANG KETERAMPILAN UMUM
					</option>
					<option value="Capaian Pembelajaran Bidang Pengetahuan" <?= ($edit['kategori'] == 'Capaian Pembelajaran Bidang Pengetahuan') ? 'selected' : '' ?>>
						CAPAIAN PEMBELAJARAN BIDANG PENGETAHUAN
					</option>
					<option value="Capaian Pembelajaran Bidang Keterampilan Khusus" <?= ($edit['kategori'] == 'Capaian Pembelajaran Bidang Keterampilan Khusus') ? 'selected' : '' ?>>
						CAPAIAN PEMBELAJARAN BIDANG KETERAMPILAN KHUSUS
					</option>
				</select>
			</div>
		</div>

		<div class="grid grid-cols-1 gap-4">
			<div class="mb-4">
				<label for="konten" class="block text-sm font-medium text-gray-700 mb-2">Capaian Pembelajaran:</label>
				<textarea id="konten" name="konten" class="editor-quill hidden"></textarea>

				<!-- Quill Editor Container -->
				<div
					id="editor-container"
					class="bg-[#fafafa] rounded-lg shadow p-4 w-full">
					<!-- Toolbar -->
					<div class="toolbar-container"></div>
					<!-- Editor area -->
					<div class="mt-2 quill-editor"><?= $edit['konten']; ?></div>
				</div>
			</div>
			<!-- <div class="output w-full max-w-2xl bg-white rounded-lg shadow p-4">
				<h3 class="text-lg font-semibold mb-2">Editor Output:</h3>
				<div class="p-2 output-content bg-gray-100 rounded quill-content"><?= $edit['konten']; ?> </div>
			</div> -->
		</div>


		<div class="divider border-gray-400"></div>
		<div class="relative flex justify-end gap-4">
			<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 mb-4"
				onclick="window.location.href='<?= site_url('Prodi/Cpl_skpi'); ?>';">Close</button>
			<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 mb-4">Submit</button>
		</div>
	</form>
</div>
