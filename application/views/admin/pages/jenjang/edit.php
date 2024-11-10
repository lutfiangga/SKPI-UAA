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
		<form method="post" action="<?= site_url(ucwords($role) . '/Jenjang/update/' . $edit['id_jenjang']) ?>"
			enctype="multipart/form-data" role="form">
			<?= csrf(); ?>
			<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
				<div class="">
					<label for="tingkat_jenjang" class="block text-sm font-medium text-gray-700 mb-2">Tingkat Jenjang:</label>
					<input type="text" id="tingkat_jenjang" name="tingkat_jenjang" value="<?= $edit['tingkat_jenjang'] ?>"
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="contoh: D1/D2/D3/D4/S1/S2/S3" />
				</div>
				<div class="">
					<label for="jenjang" class="block text-sm font-medium text-gray-700 mb-2">Jenjang:</label>
					<input type="text" id="jenjang" name="jenjang" value="<?= $edit['jenjang'] ?>"
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="contoh: Sarjana/Magister/Doctor" />
				</div>
				<div class="">
					<label for="jenjang_lanjutan" class="block text-sm font-medium text-gray-700 mb-2">Jenjang Selanjutnya:</label>
					<input type="text" id="jenjang_lanjutan" name="jenjang_lanjutan" value="<?= $edit['jenjang_lanjutan'] ?>"
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="contoh: Sarjana/Magister/Doctor" />
				</div>
				<div class="">
					<label for="jenjang_kualifikasi" class="block text-sm font-medium text-gray-700 mb-2">Jenjang Kualifikasi KKNI:</label>
					<select id="jenjang_kualifikasi" required name="jenjang_kualifikasi" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Jenjang Kualifikasi KKNI--</option>
						<option value="1" <?= ($edit['jenjang_kualifikasi'] == '1') ? 'selected' : '' ?>>Jenjang 1</option>
						<option value="2" <?= ($edit['jenjang_kualifikasi'] == '2') ? 'selected' : '' ?>>Jenjang 2</option>
						<option value="3" <?= ($edit['jenjang_kualifikasi'] == '3') ? 'selected' : '' ?>>Jenjang 3</option>
						<option value="4" <?= ($edit['jenjang_kualifikasi'] == '4') ? 'selected' : '' ?>>Jenjang 4</option>
						<option value="5" <?= ($edit['jenjang_kualifikasi'] == '5') ? 'selected' : '' ?>>Jenjang 5</option>
						<option value="6" <?= ($edit['jenjang_kualifikasi'] == '6') ? 'selected' : '' ?>>Jenjang 6</option>
						<option value="7" <?= ($edit['jenjang_kualifikasi'] == '7') ? 'selected' : '' ?>>Jenjang 7</option>
						<option value="8" <?= ($edit['jenjang_kualifikasi'] == '8') ? 'selected' : '' ?>>Jenjang 8</option>
						<option value="9" <?= ($edit['jenjang_kualifikasi'] == '9') ? 'selected' : '' ?>>Jenjang 9</option>
					</select>
				</div>
				<div class="col-span-2">
					<label for="syarat_penerimaan" class="block text-sm font-medium text-gray-700 mb-2">Syarat Penerimaan:</label>
					<textarea type="text" id="syarat_penerimaan" name="syarat_penerimaan" required rows="2"
						class="mt-1 block w-full border border-gray-300 bg-[#fafafa] text-black rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="contoh: Lulus SMA/SMK/Sederajat"><?= $edit['syarat_penerimaan'] ?></textarea>
				</div>
			</div>

			<div class="divider border-gray-400"></div>
			<div class="relative" >
				<a href="<?= site_url(ucwords($role) . '/Jenjang'); ?>"
					class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Close</a>
				<button type="submit"
					class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
			</div>
		</form>
	</section>

</section>
