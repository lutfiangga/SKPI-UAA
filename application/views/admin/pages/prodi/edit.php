<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-3xl text-xl font-bold text-blue-600 whitespace-nowrap"><?= $sub; ?></h1>
			<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg">
				<i data-feather="award" class="w-4 h-4 md:h-[24px] md:w-[24px]"></i>
			</div>
		</div>
		<div class="breadcrumbs text-sm justify-end text-blue-600">
			<ul>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="airplay" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							Application
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="paperclip" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							Kategori
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="award" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							SPM
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>
	<!-- Alert duplicate ID -->
	<?php if ($this->session->flashdata('update_error')): ?>
		<div role="alert" class="alert alert-warning">
			<svg
				xmlns="http://www.w3.org/2000/svg"
				class="h-6 w-6 shrink-0 stroke-current"
				fill="none"
				viewBox="0 0 24 24">
				<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="2"
					d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
			</svg>
			<span> <?= $this->session->flashdata('update_error'); ?></span>
		</div>
	<?php endif; ?>
	<!-- form data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<form method="post" action="<?= site_url(ucwords($role) . '/Prodi/update/' . $edit['id_prodi']) ?>"
			enctype="multipart/form-data" role="form">
			<?= csrf(); ?>
			<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
				<div class="">
					<label for="id_prodi" class="block text-sm font-medium text-gray-700 mb-2">Kode Program Studi:</label>
					<input type="text" id="id_prodi" name="id_prodi" required value="<?= $edit['id_prodi']; ?>" disabled
						class="mt-1 cursor-not-allowed block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan Kode Fakultas" />
				</div>
				<div class="">
					<label for="prodi" class="block text-sm font-medium text-gray-700 mb-2">Program Studi:</label>
					<input type="text" id="prodi" name="prodi" required value="<?= $edit['prodi']; ?>"
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan prodi" />
				</div>

				<div class="">
					<label for="select_dekan" class="block text-sm font-medium text-gray-700 mb-2">Kepala Program Studi:</label>
					<select id="select_dekan" required name="id_kaprodi" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Kepala Program Studi--</option>
						<?php foreach ($staff as $r) { ?>
							<option value="<?= $r['id_staff'] ?>" <?= ($r['id_staff'] == $edit['id_kaprodi']) ? 'selected' : '' ?>><?= $r['id_staff'] . ' | ' . $r['nama']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="">
					<label for="fakultas" class="block text-sm font-medium text-gray-700 mb-2">Fakultas:</label>
					<select id="fakultas" required name="id_fakultas" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Fakultas--</option>
						<?php foreach ($fakultas as $r) { ?>
							<option value="<?= $r['id_fakultas'] ?>" <?= ($r['id_fakultas'] == $edit['id_fakultas']) ? 'selected' : '' ?>><?= $r['id_fakultas'] . ' | ' . $r['fakultas']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="">
					<label for="akreditasi" class="block text-sm font-medium text-gray-700 mb-2">Akreditasi Program Studi:</label>
					<select id="select_dekan" required name="id_akreditasi" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Akreditasi Program Studi--</option>
						<?php foreach ($akred as $r) { ?>
							<option value="<?= $r['id_akreditasi'] ?>" <?= ($r['id_akreditasi'] == $edit['id_akreditasi']) ? 'selected' : '' ?>><?= $r['akreditasi']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="">
					<label for="jenjang_lanjutan" class="block text-sm font-medium text-gray-700 mb-2">Jenjang Selanjutnya:</label>
					<input type="text" id="jenjang_lanjutan" name="jenjang_lanjutan" required value="<?= $edit['jenjang_lanjutan']; ?>"
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan jenjang selanjutnya contoh: Doctor" />
				</div>
			</div>

			<div class="divider border-gray-400"></div>
			<div class="modal-action relative" style="z-index: 1000;">
				<a href="<?= site_url(ucwords($role) . '/Prodi'); ?>"
					class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Close</a>
				<button type="submit"
					class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
			</div>
		</form>
	</section>

</section>
