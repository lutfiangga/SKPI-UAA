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

							Eticket
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>
	<!-- table data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">

		<!-- add user -->
		<button class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 w-full md:w-auto flex flex-row items-center" onclick="addSpm.showModal()">
			<div class="bg-[#faafa] md:p-3 p-2 rounded-lg">
				<i data-feather="upload-cloud" class="w-4 h-4"></i>
			</div>
			Upload SPM
		</button>
		<div class="overflow-x-auto">
			<table class="min-w-full table-auto table-info">
				<thead class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Tanggal</th>
						<th class="p-2">Kategori</th>
						<th class="p-2">File</th>
						<th class="p-2">Url</th>
						<th class="p-2">Poin</th>
						<th class="p-2">Status</th>
						<th class="p-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($read as $row) {
						if ($row->nim == $this->session->userdata('id_user')) {
					?>
							<tr class="border-t">
								<td class="p-2">
									<?= $no; ?>
								</td>
								<td class="p-2 whitespace-nowrap"><?= tanggal($row->tanggal) ?></td>
								<td class="p-2 whitespace-nowrap"><?= $row->nama_kategori ?></td>

								<td class="p-2">
									<?php if (!empty($row->file)) : ?>
										<a href="<?= base_url('assets/static/spm/img/syarat_wajib/' . $row->file); ?>" download class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="file-text" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-wrap"><?= $row->file; ?></p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2">
									<?php if (!empty($row->url)) : ?>
										<a href="<?= $row->url; ?>" target="_blank" class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="link-2" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin whitespace-normal"><?= $row->url; ?></p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2 whitespace-nowrap">
									<span class="flex items-center cursor-default text-sm gap-2 text-green-600 hover:bg-lavender-gray py-2 rounded-full">
										<i data-feather="check-circle" class="w-4 h-auto"></i>
										<?= !empty($row->poin) ? $row->poin . ' Poin' : 'N/A'; ?>
									</span>
								</td>
								<td>
									<?php if ($row->status == 'pending') : ?>
										<span class="flex items-center text-sm gap-2 text-orange-600 hover:bg-[#EEF0F6] p-2 rounded-full">
											<i data-feather="alert-circle" class="w-4 h-auto"></i>
											On Review
										</span>
									<?php elseif ($row->status == 'diterima') : ?>
										<span class="flex items-center text-sm gap-2 text-green-600 hover:bg-[#EEF0F6] p-2 rounded-full">
											<i data-feather="check-circle" class="w-4 h-auto"></i>
											Verified
										</span>
									<?php elseif ($row->status == 'ditolak') : ?>
										<span class="flex items-center text-sm gap-2 text-red-600 hover:bg-[#EEF0F6] p-2 rounded-full">
											<i data-feather="x-circle" class="w-4 h-auto"></i>
											Unverified
										</span>
									<?php endif; ?>
								</td>
								<td class="p-2 flex flex-row items-center mt-2 gap-2">
									<?php if ($row->status == 'pending'): ?>
										<button type="button" onclick="openEditModal('<?= $row->id_syarat_wajib ?>', '<?= $row->id_syarat_wajib_kategori; ?>', '<?= $row->url; ?>', '<?= $row->file; ?>')" class="bg-orange-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
											<i data-feather="edit" class="w-4 h-auto"></i>
											<p class="hidden group-hover:block text-white transition-opacity duration-300">Edit</p>
										</button>
										<button type="button" onclick="openDeleteModal(<?= $row->id_syarat_wajib; ?>)" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
											<i data-feather="trash-2" class="w-4 h-auto"></i>
											<p class="hidden group-hover:block text-white transition-opacity duration-300">Hapus</p>
										</button>
									<?php else: ?>
										<p class="text-xs text-gray-400 mt-3">
											<?= (!empty(trim($row->keterangan))) ? 'Keterangan: ' . $row->keterangan : 'No action needed'; ?>
										</p>
									<?php endif; ?>
								</td>
							</tr>
					<?php
							$no++;
						}
					}
					?>
				</tbody>
				<tfoot class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Tanggal</th>
						<th class="p-2">Kategori</th>
						<th class="p-2">File</th>
						<th class="p-2">Url</th>
						<th class="p-2">Poin</th>
						<th class="p-2">Status</th>
						<th class="p-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</section>

	<!-- modal add Eticket -->
	<dialog id="addSpm" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa]">
			<!-- Tombol close di sudut kanan atas -->
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
				Upload Spm
				<div class="bg-blue-600 p-2 sm:p-3 text-[#fafafa] rounded-lg ml-2 sm:ml-4">
					<i data-feather="upload-cloud" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<form method="post" action="<?= site_url('Mahasiswa/Spm_Wajib/save'); ?>" enctype="multipart/form-data" role="form">
				<?= csrf(); ?>
				<div class="mb-4">
					<label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori:</label>
					<select id="kategori" name="id_syarat_wajib_kategori" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Kategori--</option>
						<?php foreach ($kategori->result_array() as $r) { ?>
							<option value="<?= $r['id_syarat_wajib_kategori'] ?>"><?= $r['id_syarat_wajib_kategori'] . ' | ' . $r['nama_kategori']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="mb-4">
					<label for="pelanggaran" class="block text-sm font-medium text-gray-700 mb-2">Url:</label>
					<input type="url" id="url" oninput="inputValidation(this)" name="url" class="p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="https://example.com">
					<p id="urlError" class="text-red-500 text-xs sm:text-sm md:text-base mt-2 hidden">Url harus valid! contoh: https://example.com</p>
				</div>

				<div class="mb-4">
					<label for="file" class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Upload Bukti:</label>
					<div class="relative file-upload-container">
						<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-2 border-blue-400 border-2 border-dashed rounded-lg w-full shadow-lg transtition">
							<div class="text-center flex flex-col gap-1 md:gap-2">
								<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
								</svg>
								<p class="text-gray-600 text-xs sm:text-sm font-semibold">
									<i class="fas fa-cloud-upload-alt"></i><span class="text-blue-600 font-bold">Upload File</span> atau Drag & Drop
								</p>
								<p class="text-xs text-gray-500 mb-2">JPG, PNG up to 5 MB</p>
							</div>

							<input id="file" required name="file" accept="image/jpg, image/png, image/jpeg, image/wepb" type="file" class="file-input hidden" />

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
				<div class="modal-action relative flex justify-end gap-4">
					<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 mb-4"
						onclick="this.closest('dialog').close();">Close</button>
					<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 mb-4">Submit</button>
				</div>
			</form>
		</div>
	</dialog>

	<!-- Modal edit Kategori -->
	<dialog id="editSpm" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa]">
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
				Edit SPM
				<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
					<i data-feather="award" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<form method="post" action="<?= site_url('Mahasiswa/Spm_Wajib/update'); ?>" enctype="multipart/form-data" role="form">
				<?= csrf(); ?>
				<input type="hidden" id="edit_id_syarat_wajib" name="id_syarat_wajib" value="" />

				<div class="mb-4">
					<label for="edit_kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori:</label>
					<select id="edit_kategori" name="id_syarat_wajib_kategori" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih kategori--</option>
						<?php foreach ($kategori->result_array() as $r) { ?>
							<option value="<?= $r['id_syarat_wajib_kategori'] ?>" <?= ($r['id_syarat_wajib_kategori'] == $r['id_syarat_wajib_kategori']) ? 'selected' : '' ?>><?= $r['id_syarat_wajib_kategori'] . ' | ' . $r['nama_kategori']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="mb-4">
					<label for="edit_url" class="block text-sm font-medium text-gray-700 mb-2">Url:</label>
					<input type="url" id="edit_url" oninput="inputValidation(this)" name="url" class="p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="https://example.com">
					<p id="urlError" class="text-red-500 text-xs sm:text-sm md:text-base mt-2 hidden">Url harus valid! contoh: https://example.com</p>
				</div>

				<div class="mb-4">
					<label for="edit_file" class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Upload Bukti:</label>
					<div class="relative file-upload-container">
						<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-2 border-blue-400 border-2 border-dashed rounded-lg w-full shadow-lg transtition">
							<div class="text-center flex flex-col gap-1 md:gap-2">
								<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
								</svg>
								<p class="text-gray-600 text-xs sm:text-sm font-semibold">
									<i class="fas fa-cloud-upload-alt"></i><span class="text-blue-600 font-bold">Upload File</span> atau Drag & Drop
								</p>
								<p class="text-xs text-gray-500 mb-2">JPG, PNG up to 5 MB</p>
							</div>

							<input id="edit_file" required name="file" accept="image/jpg, image/png, image/jpeg, image/wepb" type="file" class="file-input hidden" />

							<div class="relative mt-4">
								<div class="progress-bar text-xs sm:text-sm bg-green-500 h-5 rounded transition-all duration-300" style="width: 0%"></div>
								<div class="progress-text text-xs sm:text-sm absolute left-1/2 transform -translate-x-1/2 text-gray-800" style="display: none">0%</div>
							</div>

						</div>
						<!-- file preview -->
						<div class="file-preview w-full">
							<div class="flex justify-between items-center p-2 mt-2 rounded-xl bg-[#eef0f6]">
								<div id="edit-file-name" class="file-name text-blue-600 text-xs sm:text-sm md:text-base truncate max-w-xs p-2"></div>
								<button type="button" class="clear-btn btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:border-2 hover:border-blue-600 hover:shadow-md hidden text-xs sm:text-sm md:text-base">
									<span class="flex flex-row gap-2 items-center">
										<i data-feather="trash-2" class="w-4 h-auto"></i> Hapus
									</span>
								</button>
							</div>
							<div id="edit-preview-container" class="preview-container w-full flex justify-center mx-auto"></div>
						</div>

						<div class="modal hidden">
							<span class="close-modal text-white text-3xl cursor-pointer absolute top-4 right-4">&times;</span>
							<img class="modal-content max-w-80% max-h-80%" />
						</div>
					</div>
				</div>

				<div class="modal-action relative" style="z-index: 1000;">
					<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
					<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Update</button>
				</div>
			</form>
		</div>
	</dialog>

	<!-- Modal Hapus Kategori -->
	<dialog id="hapusSpm" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa]">
			<!-- Tombol close di sudut kanan atas -->
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-lg font-bold text-red-600 flex flex-row items-center">
				Hapus Spm
				<div class="bg-red-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
					<i data-feather="trash-2" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus kategori ini?</p>
			<form method="post" action="<?= site_url('Mahasiswa/Spm_Wajib/delete'); ?>">
				<?= csrf(); ?>
				<input type="hidden" id="hapus_id_syarat_wajib" name="id_syarat_wajib" />
				<div class="modal-action relative" style="z-index: 1000;">
					<button type="button" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
					<button type="submit" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Hapus</button>
				</div>
			</form>
		</div>
	</dialog>

</section>

<script>
	const openEditModal = (id, kategori, url, file) => {
		document.getElementById('edit_id_syarat_wajib').value = id;
		document.getElementById('edit_kategori').value = kategori;
		document.getElementById('edit_url').value = url;

		const filePreview = document.querySelector('#edit-file-name');
		const previewContainer = document.querySelector('#edit-preview-container');


		filePreview.textContent = file; // Menampilkan nama file yang sudah ada

		// Menampilkan preview file jika ada
		if (file) {
			const imageUrl = `<?= base_url('./assets/static/spm/img/syarat_wajib/') ?>${file}`;
			previewContainer.innerHTML = `<img src="${imageUrl}" class="max-w-md h-auto max-h-60 object-cover" alt="Preview file" />`;
		} else {
			previewContainer.innerHTML = ''; // Kosongkan jika tidak ada file
		}

		document.getElementById('editSpm').showModal();
	}


	// delete spm
	const openDeleteModal = (id) => {
		document.getElementById('hapus_id_syarat_wajib').value = id;
		document.getElementById('hapusSpm').showModal();
	}
</script>
