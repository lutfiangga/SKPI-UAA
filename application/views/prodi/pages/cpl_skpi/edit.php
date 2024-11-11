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
					<?php foreach ($prodi as $r) { ?>
						<option value="<?= $r['id_prodi'] ?>" <?= ($r['id_prodi'] == $edit['id_prodi']) ? 'selected' : '' ?>><?= $r['id_prodi'] . ' | ' . $r['prodi']; ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="mb-4">
				<label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Bidang CPL:</label>
				<select id="kategori" required name="id_kategori_cpl" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
					<option value="" selected disabled>--Pilih Bidang CPL--</option>
					<?php foreach ($cpl as $r) { ?>
						<option value="<?= $r['id_kategori_cpl'] ?>" <?= ($r['id_kategori_cpl'] == $edit['id_kategori_cpl']) ? 'selected' : '' ?>><?= $r['kategori']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="grid grid-cols-1 gap-4">
			<div class="mb-4">
				<label for="konten" class="block text-sm font-medium text-gray-700 mb-2">Capaian Pembelajaran:</label>
				<textarea type="text" id="konten" name="konten" required rows="2"
					class="mt-1 block w-full border border-gray-300 text-gray-800 bg-[#fafafa] rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
					placeholder="Tata Nilai"><?= $edit['konten']; ?> </textarea>
			</div>


			<div class="divider border-gray-400"></div>
			<div class="relative flex justify-end gap-4">
				<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 mb-4"
					onclick="window.location.href='<?= site_url('Prodi/Cpl_skpi'); ?>';">Close</button>
				<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 mb-4">Submit</button>
			</div>
	</form>
</div>
