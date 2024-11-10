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
						<i data-feather="users" class="w-4 h-auto"></i>
						<span class="hidden md:block">

							Mahasiswa
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="activity" class="w-4 h-auto"></i>
						<span class="hidden md:block">

							Etiquette
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>
	<!-- Alert duplicate -->
	<?php if ($this->session->flashdata('create_error')): ?>
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
			<span> <?= $this->session->flashdata('create_error'); ?></span>
		</div>
	<?php endif; ?>
	<!-- form data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<form method="post" action="<?= site_url(ucwords($role) . '/Etiquette_Mahasiswa/save') ?>"
			enctype="multipart/form-data" role="form">
			<?= csrf(); ?>
			<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
				<div class="mb-4">
					<label for="select_mahasiswa" class="block text-sm font-medium text-gray-700 mb-2">Mahasiswa:</label>
					<select id="select_mahasiswa" name="nim" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Mahasiswa--</option>
						<?php foreach ($mhs as $r) { ?>
							<option value="<?= $r['nim'] ?>"><?= $r['nim'] . ' | ' . $r['nama']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="mb-4">
					<label for="jenis_pelanggaran" class="block text-sm font-medium text-gray-700 mb-2">Jenis Pelanggaran:</label>
					<select id="jenis_pelanggaran" required name="jenis_pelanggaran" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Jenis pelanggaran--</option>
						<option value="ringan">Ringan</option>
						<option value="sedang">Sedang</option>
						<option value="berat">Berat</option>
						<option value="sangat berat">Sangat Berat</option>
					</select>
				</div>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
				<div class="mb-4">
					<label for="pelanggaran" class="block text-sm font-medium text-gray-700 mb-2">Pelanggaran:</label>
					<textarea id="pelanggaran" name="pelanggaran" required
						class="mt-1 bg-off-white text-black block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan deskripsi pelanggaran"></textarea>
				</div>

				<div class="mb-4">
					<label for="poin" class="block text-sm font-medium text-gray-700 mb-2">Poin:</label>
					<input type="number" id="poin" name="poin" required
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan poin" />
				</div>
			</div>

			<div class="mb-4">
				<label for="file" class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Upload Bukti:</label>
				<div class="relative file-upload-container grid grid-cols-1 md:grid-cols-2 gap-4">
					<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-blue-400 border-2 border-dashed rounded-lg  w-full shadow-lg transtition">
						<div class="text-center flex flex-col gap-1 md:gap-2">
							<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
							</svg>
							<p class="text-gray-600 text-xs sm:text-sm font-semibold">
								<i class="fas fa-cloud-upload-alt"></i><span class="text-blue-600 font-bold">Upload File</span> atau Drag & Drop
							</p>
							<p class="text-xs text-gray-500 mb-2">JPG, PNG up to 5 MB</p>
						</div>

						<input id="file" required name="bukti" accept="image/jpg, image/png, image/jpeg, image/wepb" type="file" class="file-input hidden" />

						<div class="relative mt-4">
							<div class="progress-bar text-xs sm:text-sm bg-green-500 h-5 rounded transition-all duration-300" style="width: 0%"></div>
							<div class="progress-text text-xs sm:text-sm absolute left-1/2 transform -translate-x-1/2 text-gray-800" style="display: none">0%</div>
						</div>

					</div>
					<!-- file preview -->
					<div class="file-preview w-full">
						<div class="flex justify-between items-center p-2 mt-2 rounded-xl bg-[#eef0f6]">
							<div class="file-name text-blue-600 text-xs sm:text-sm md:text-base truncate max-w-xs p-2"></div>
							<button type="button" class="clear-btn btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:border-2 hover:border-blue-600 hover:shadow-md hidden text-xs sm:text-sm md:text-base">
								<span class="flex flex-row gap-2 items-center">
									<i data-feather="trash-2" class="w-4 h-auto"></i> Hapus
								</span>
							</button>
						</div>
						<div class="preview-container w-full flex justify-center mx-auto"></div>
					</div>

					<div class="modal hidden">
						<span class="close-modal text-white text-3xl cursor-pointer absolute top-4 right-4">&times;</span>
						<img class="modal-content max-w-80% max-h-80%" />
					</div>
				</div>
			</div>

			<div class="divider border-gray-400"></div>
			<div class="modal-action relative" style="z-index: 1000;">
				<a href="<?= site_url(ucwords($role) . '/Etiquette_Mahasiswa'); ?>"
					class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Close</a>
				<button type="submit"
					class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
			</div>
		</form>
	</section>

</section>
