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
						<i data-feather="award" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							SPM
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="user" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							Mahasiswa
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>
	<?php if ($this->session->flashdata('create_success')): ?>
		<div role="alert" class="alert alert-success">
			<svg
				xmlns="http://www.w3.org/2000/svg"
				class="h-6 w-6 shrink-0 stroke-current"
				fill="none"
				viewBox="0 0 24 24">
				<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="2"
					d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
			</svg>
			<span> <?= $this->session->flashdata('create_success'); ?></span>
		</div>
	<?php endif; ?>
	<!-- update -->
	<?php if ($this->session->flashdata('update_success')): ?>
		<div role="alert" class="alert alert-success">
			<svg
				xmlns="http://www.w3.org/2000/svg"
				class="h-6 w-6 shrink-0 stroke-current"
				fill="none"
				viewBox="0 0 24 24">
				<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="2"
					d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
			</svg>
			<span> <?= $this->session->flashdata('update_success'); ?></span>
		</div>
	<?php endif; ?>
	<!-- delete -->
	<?php if ($this->session->flashdata('delete_success')): ?>
		<div role="alert" class="alert alert-error">
			<svg
				xmlns="http://www.w3.org/2000/svg"
				class="h-6 w-6 shrink-0 stroke-current"
				fill="none"
				viewBox="0 0 24 24">
				<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="2"
					d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
			</svg>
			<span> <?= $this->session->flashdata('delete_success'); ?></span>
		</div>
	<?php endif; ?>
	<!-- table data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">

		<!-- add user -->
		<button
			class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 w-full md:w-auto flex flex-row items-center"
			onclick="addSpm.showModal()">
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
						if ($row['nim'] == $id_user && $row['id_akun'] == $id_akun) {
					?>
							<tr class="border-t">
								<td class="p-2">
									<?= $no; ?>
								</td>
								<td class="p-2 whitespace-nowrap"><?= tanggal($row['tanggal']) ?></td>
								<td class="p-2 whitespace-normal"><?= $row['kategori'] ?></td>

								<td class="p-2">
									<?php if (!empty($row['file'])) : ?>
										<a href="<?= base_url('assets/static/spm/img/syarat_wajib/' . $row['file']); ?>" download
											class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="file-text" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-normal"><?= $row['file']; ?>
											</p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2">
									<?php if (!empty($row['url'])) : ?>
										<a href="<?= $row['url']; ?>" target="_blank"
											class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="link-2" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin whitespace-normal"><?= $row['url']; ?></p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2 whitespace-nowrap">
									<span
										class="flex items-center cursor-default text-sm gap-2 text-green-600 hover:bg-lavender-gray py-2 rounded-full">
										<i data-feather="check-circle" class="w-4 h-auto"></i>
										<?= !empty($row['poin']) ? $row['poin'] . ' Poin' : 'N/A'; ?>
									</span>
								</td>
								<td>
									<?php if ($row['status'] == 'pending') : ?>
										<span
											class="flex items-center text-sm gap-2 text-orange-600 hover:bg-[#EEF0F6] p-2 rounded-full">
											<i data-feather="alert-circle" class="w-4 h-auto"></i>
											On Review
										</span>
									<?php elseif ($row['status'] == 'diterima') : ?>
										<span
											class="flex items-center text-sm gap-2 text-green-600 hover:bg-[#EEF0F6] p-2 rounded-full">
											<i data-feather="check-circle" class="w-4 h-auto"></i>
											Verified
										</span>
									<?php elseif ($row['status'] == 'ditolak') : ?>
										<span
											class="flex items-center text-sm gap-2 text-red-600 hover:bg-[#EEF0F6] p-2 rounded-full">
											<i data-feather="x-circle" class="w-4 h-auto"></i>
											Unverified
										</span>
									<?php endif; ?>
								</td>
								<td class="p-2 flex flex-row items-center gap-2">
									<?php if ($row['status'] == 'pending'): ?>
										<button type="button"
											onclick="openEditModal('<?= $row['id_syarat_wajib'] ?>', '<?= $row['id_kategori_syarat_wajib']; ?>', '<?= $row['url']; ?>', '<?= $row['file']; ?>')"
											class="rounded-full p-2 bg-orange-100 text-orange-600 hover:scale-125 hover:bg-orange-200 flex items-center gap-2">
											<i data-feather="edit" class="w-4 h-auto"></i>
										</button>
										<button type="button" onclick="openDeleteModal('<?= $row['id_syarat_wajib']; ?>')"
											class="rounded-full p-2 bg-red-100 text-red-600 hover:scale-125 hover:bg-red-200 flex items-center gap-2">
											<i data-feather="trash-2" class="w-4 h-auto"></i>
										</button>
									<?php else: ?>
										<p class="text-xs text-gray-400 whitespace-normal mt-3">
											<?= (!empty(trim($row['keterangan']))) ? 'Keterangan: ' . $row['keterangan'] : 'No action needed'; ?>
										</p>
									<?php endif; ?>
								</td>
							</tr>

							<!-- Modal edit SPM -->
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
									<form method="post" action="<?= site_url('Mahasiswa/Syarat_wajib/update'); ?>" enctype="multipart/form-data"
										role="form">
										<?= csrf(); ?>
										<input type="hidden" id="edit_id_syarat_wajib" name="id_syarat_wajib" value="" />

										<div class="mb-4">
											<label for="edit_kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori:</label>
											<select id="edit_kategori" required name="id_kategori_syarat_wajib"
												class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
												<option value="" disabled>--Pilih kategori--</option>
												<?php foreach ($kategori->result_array() as $r) { ?>
													<option value="<?= $r['id_kategori_syarat_wajib'] ?>"
														<?= ($r['id_kategori_syarat_wajib'] == $row['id_kategori_syarat_wajib']) ? 'selected' : '' ?>
														data-type="<?= $r['type'] ?>">
														<?= $r['kategori']; ?></option>
												<?php } ?>
											</select>

										</div>

										<div class="mb-4">
											<label for="edit_url" class="block text-sm font-medium text-gray-700 mb-2">Url:</label>
											<input type="url" required id="edit_url" oninput="inputValidation(this)" name="url"
												class="p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
												placeholder="https://example.com">
											<p id="urlError" class="text-red-500 text-xs sm:text-sm md:text-base mt-2 hidden">Url harus valid!
												contoh: https://example.com</p>
										</div>

										<div id="edit_file_upload" class="mb-4 hidden">
											<label for="edit_file" class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Upload
												Bukti:</label>
											<div class="relative file-upload-container">
												<div id="edit-drop-zone"
													class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8  border-blue-400 border-2 border-dashed rounded-lg w-full shadow-lg transtition">
													<div class="text-center flex flex-col gap-1 md:gap-2">
														<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
															aria-hidden="true">
															<path fill-rule="evenodd"
																d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
																clip-rule="evenodd" />
														</svg>
														<p class="text-gray-600 text-xs sm:text-sm font-semibold">
															<i class="fas fa-cloud-upload-alt"></i><span class="text-blue-600 font-bold">Upload
																File</span> atau Drag & Drop
														</p>
														<p class="text-xs text-gray-500 mb-2">JPG, PNG up to 5 MB</p>
													</div>

													<input id="edit_file" name="file" accept="image/jpg, image/png, image/jpeg, image/wepb"
														type="file" class="file-input hidden" />

													<div class="relative mt-4">
														<div class="progress-bar text-xs sm:text-sm bg-green-500 h-5 rounded transition-all duration-300"
															style="width: 0%"></div>
														<div class="progress-text text-xs sm:text-sm absolute left-1/2 transform -translate-x-1/2 text-gray-800"
															style="display: none">0%</div>
													</div>

												</div>
												<!-- file preview -->
												<div class="file-preview w-full">
													<div class="flex justify-between items-center p-2 mt-2 rounded-xl bg-[#eef0f6]">
														<div id="edit-file-name"
															class="file-name text-blue-600 text-xs sm:text-sm md:text-base truncate max-w-xs p-2">
														</div>
														<button type="button"
															class="clear-btn btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:border-2 hover:border-blue-600 hover:shadow-md hidden text-xs sm:text-sm md:text-base">
															<span class="flex flex-row gap-2 items-center">
																<i data-feather="trash-2" class="w-4 h-auto"></i> Hapus
															</span>
														</button>
													</div>
													<div id="edit-preview-container"
														class="preview-container w-full flex justify-center mx-auto"></div>
												</div>

												<div class="modal hidden">
													<span
														class="close-modal text-white text-3xl cursor-pointer absolute top-4 right-4">&times;</span>
													<img class="modal-content max-w-80% max-h-80%" />
												</div>
											</div>
										</div>

										<div class="modal-action relative" style="z-index: 1000;">
											<button type="button"
												class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4"
												onclick="this.closest('dialog').close();">Close</button>
											<button type="submit"
												class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Update</button>
										</div>
									</form>
								</div>
							</dialog>
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

	<!-- modal add spm -->
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
			<form method="post" action="<?= site_url('Mahasiswa/Syarat_wajib/save'); ?>" enctype="multipart/form-data"
				role="form">
				<?= csrf(); ?>

				<!-- select kategori -->
				<div class="mb-4">
					<label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori:</label>
					<select id="kategori" required name="id_kategori_syarat_wajib"
						class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Kategori--</option>
						<?php foreach ($kategori->result_array() as $r) { ?>
							<option value="<?= $r['id_kategori_syarat_wajib'] ?>" data-type="<?= $r['type'] ?>">
								<?= $r['kategori']; ?></option>
						<?php } ?>
					</select>
				</div>

				<!-- url -->
				<div class="mb-4">
					<label for="url" class="block text-sm font-medium text-gray-700 mb-2">Url:</label>
					<input type="url" required id="url" oninput="inputValidation(this)" name="url"
						class="p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						placeholder="https://example.com">
					<p id="urlError" class="text-red-500 text-xs sm:text-sm md:text-base mt-2 hidden">Url harus valid!
						contoh: https://example.com</p>
				</div>

				<!-- upload file -->
				<div id="uploadFileSection" class="mb-4 hidden">
					<label for="file" class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Upload
						Bukti:</label>
					<div class="relative file-upload-container">
						<div
							class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-2 border-blue-400 border-dashed rounded-lg w-full shadow-lg">
							<div class="text-center flex flex-col gap-1 md:gap-2">
								<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
									aria-hidden="true">
									<path fill-rule="evenodd"
										d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
										clip-rule="evenodd" />
								</svg>
								<p class="text-gray-600 text-xs sm:text-sm font-semibold">
									<i class="fas fa-cloud-upload-alt"></i><span class="text-blue-600 font-bold"> Upload
										File</span> atau Drag & Drop
								</p>
								<p class="text-xs text-gray-500 mb-2">JPG, PNG up to 5 MB</p>
							</div>
							<input id="file" name="file" accept="image/jpg, image/png, image/jpeg, image/wepb"
								type="file" class="file-input hidden" />
							<div class="relative mt-4">
								<div class="progress-bar text-xs sm:text-sm bg-green-500 h-5 rounded transition-all duration-300"
									style="width: 0%"></div>
								<div class="progress-text text-xs sm:text-sm absolute left-1/2 transform -translate-x-1/2 text-gray-800"
									style="display: none">0%</div>
							</div>

						</div>
						<!-- file preview -->
						<div class="file-preview w-full">
							<div class="flex justify-between items-center p-2 mt-2 rounded-xl bg-[#eef0f6]">
								<div
									class="file-name text-blue-600 text-xs sm:text-sm md:text-base truncate max-w-xs p-2">
								</div>
								<button type="button"
									class="clear-btn btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:border-2 hover:border-blue-600 hover:shadow-md hidden text-xs sm:text-sm md:text-base">
									<span class="flex flex-row gap-2 items-center">
										<i data-feather="trash-2" class="w-4 h-auto"></i> Hapus
									</span>
								</button>
							</div>
							<div class="preview-container w-full flex justify-center mx-auto"></div>
						</div>
					</div>
				</div>

				<div class="divider border-gray-400"></div>
				<div class="modal-action relative flex justify-end gap-2">
					<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 mb-4"
						onclick="this.closest('dialog').close();">Close</button>
					<button type="submit"
						class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 mb-4">Submit</button>
				</div>
			</form>

		</div>
	</dialog>

	<!-- Modal Hapus Syarat Wajib -->
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
			<p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus?</p>
			<form method="post" action="<?= site_url('Mahasiswa/Syarat_wajib/delete'); ?>">
				<?= csrf(); ?>
				<input type="hidden" id="hapus_id_syarat_wajib" name="id_syarat_wajib" />
				<div class="modal-action relative" style="z-index: 1000;">
					<button type="button"
						class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4"
						onclick="this.closest('dialog').close();">Close</button>
					<button type="submit"
						class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Hapus</button>
				</div>
			</form>
		</div>
	</dialog>

</section>
<script>
	// Toggle file upload visibility based on selected option's data-type attribute
	const UploadFileVisibility = (selectId, fileSectionId) => {
		const fileSection = document.getElementById(fileSectionId);
		const type = document.getElementById(selectId).selectedOptions[0].getAttribute("data-type");
		fileSection.classList.toggle("hidden", type !== "file");
	};

	// Event listeners for select elements
	["kategori", "edit_kategori"].forEach((id, i) => {
		document.getElementById(id).addEventListener("change", () =>
			UploadFileVisibility(id, i ? "edit_file_upload" : "uploadFileSection")
		);
	});

	// Open edit modal with pre-filled values and preview
	const openEditModal = (id, kategori, url, file) => {
		document.getElementById('edit_id_syarat_wajib').value = id;
		document.getElementById('edit_url').value = url;

		// Set selected category and trigger change event
		const kategoriSelect = document.getElementById('edit_kategori');
		kategoriSelect.value = kategori;
		kategoriSelect.dispatchEvent(new Event('change'));

		// Display file name and preview
		document.getElementById('edit-file-name').textContent = file;
		document.getElementById('edit-preview-container').innerHTML = file ?
			`<img src="<?= base_url('./assets/static/spm/img/syarat_wajib/') ?>${file}" class="w-full h-auto max-h-60 object-cover" alt="Preview file" />` :
			'';

		document.getElementById('editSpm').showModal();
	};

	// Open delete modal with specific ID
	const openDeleteModal = id => {
		document.getElementById('hapus_id_syarat_wajib').value = id;
		document.getElementById('hapusSpm').showModal();
	};
</script>
