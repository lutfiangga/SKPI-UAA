<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-3xl text-xl font-bold text-blue-600 whitespace-nowrap"><?= $sub; ?></h1>
			<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg">
				<i data-feather="activity" class="w-4 h-4 md:h-[24px] md:w-[24px]"></i>
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
	<!-- table data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">

		<!-- add user -->
		<button class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 w-full md:w-auto flex flex-row items-center" onclick="addEtiket.showModal()">
			<div class="bg-[#faafa] md:p-3 p-2 rounded-lg">
				<i data-feather="activity" class="w-4 h-4"></i>
			</div>
			Tambah Etiket Mahasiswa
		</button>
		<div class="overflow-x-auto">
			<table class="min-w-full table-auto table-data">
				<thead class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Mahasiswa</th>
						<th class="p-2">Pelanggaran</th>
						<th class="p-2">Jenis Pelanggaran</th>
						<th class="p-2">Bukti</th>
						<th class="p-2">Poin</th>
						<th class="p-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($read)) {
						$no = 1;
						foreach ($read->result_array() as $row) {
							$img_user = $row['img_user'] ? 'assets/static/img/photos/' . strtolower($row['role']) . '/' . $row['img_user'] : 'assets/static/img/user.png';
					?>
							<tr class="border-t">
								<td class="p-2">
									<?= $no; ?>
								</td>
								<td class="p-2">
									<div class="flex flex-row gap-2 items-center">
										<img src="<?= base_url($img_user); ?>" alt="role" class="rounded-full w-8 h-8">
										<div class="flex flex-col items-center justify-center">
											<p class="truncate w-full text-xs md:text-sm ml-2 font-semibold whitespace-normal"><?= $row['nama'] ?></p>
											<p class="truncate w-full ml-2 text-[0.6rem] tracking-wide uppercase"><?= $row['prodi']; ?> - <?= $row['nim']; ?></p>
										</div>
									</div>
								</td>
								<td class="p-2 whitespace-normal"><?= $row['pelanggaran'] ?></td>
								<td class="p-2 whitespace-nowrap"><?= $row['jenis_pelanggaran'] ?></td>
								<td class="p-2">
									<?php if (!empty($row['bukti'])) : ?>
										<a href="<?= base_url('assets/static/Etiquette/' . $row['bukti']); ?>" download class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="image" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-normal"><?= $row['bukti']; ?></p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2 whitespace-nowrap">
									<span class="flex items-center cursor-default text-sm gap-2 text-green-600 hover:bg-lavender-gray py-2 rounded-full">
										<i data-feather="check-circle" class="w-4 h-auto"></i>
										<?= $row['poin'] ?> Poin
									</span>
								</td>
								<td class="p-2 flex flex-row items-center mt-2 gap-2">
									<button class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group"
										onclick="openEditModal('<?= $row['id_etiquette']; ?>', '<?= $row['nim']; ?>', '<?= $row['jenis_pelanggaran']; ?>', '<?= $row['pelanggaran']; ?>', '<?= $row['poin']; ?>', '<?= $row['bukti']; ?>')">
										<i data-feather="edit" class="w-4 h-auto"></i>
										<p class="hidden group-hover:block text-white transition-opacity duration-300">Edit</p>
									</button>

									<button class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group" onclick="openDeleteModal(<?= $row['id_etiquette']; ?>)">
										<i data-feather="trash-2" class="w-4 h-auto"></i>
										<p class="hidden group-hover:block text-white transition-opacity duration-300">Hapus</p>
									</button>

								</td>
							</tr>
						<?php $no++;
						}
					} else { ?>
						<tr>
							<td colspan="6" class="text-center">Tidak ada data</td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Mahasiswa</th>
						<th class="p-2">Pelanggaran</th>
						<th class="p-2">Jenis Pelanggaran</th>
						<th class="p-2">Bukti</th>
						<th class="p-2">Poin</th>
						<th class="p-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</section>

	<!-- modal add Etiquette -->
	<dialog id="addEtiket" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa] w-full sm:w-11/12 lg:max-w-5xl mx-auto p-4">
			<!-- Tombol close di sudut kanan atas -->
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
				Tambah Etiket Mahasiswa
				<div class="bg-blue-600 p-2 sm:p-3 text-[#fafafa] rounded-lg ml-2 sm:ml-4">
					<i data-feather="activity" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<form method="post" action="<?= site_url('Etiquette/Etiquette_Mahasiswa/save'); ?>" enctype="multipart/form-data" role="form">
				<?= csrf(); ?>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
					<div class="mb-4">
						<label for="select_mahasiswa" class="block text-sm font-medium text-gray-700 mb-2">Mahasiswa:</label>
						<select id="select_mahasiswa" name="nim" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
							<option value="" selected disabled>--Pilih Mahasiswa--</option>
							<?php foreach ($mhs->result_array() as $r) { ?>
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
						<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-2 border-blue-400 border-2 border-dashed rounded-lg  w-full shadow-lg transtition">
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
				<div class="modal-action relative flex justify-end gap-4">
					<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 mb-4"
						onclick="this.closest('dialog').close();">Close</button>
					<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 mb-4">Submit</button>
				</div>
			</form>
		</div>
	</dialog>

	<!-- Modal edit Etiquette -->
	<dialog id="editEtiket" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa] w-11/12 max-w-5xl">
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
				Edit Etiquette Mahasiswa
				<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
					<i data-feather="activity" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<form method="post" action="<?= site_url('Etiquette/Etiquette_Mahasiswa/update'); ?>" enctype="multipart/form-data" role="form">
				<?= csrf(); ?>
				<input type="hidden" id="edit_id_etiquette" name="id_etiquette" value="" />

				<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
					<div class="mb-4">
						<label for="edit_mhs" class="block text-sm font-medium text-gray-700 mb-2">Mahasiswa:</label>
						<select id="edit_mhs" name="nim" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
							<option value="" disabled>--Pilih Mahasiswa--</option>
							<?php foreach ($mhs->result_array() as $r) { ?>
								<option value="<?= $r['nim'] ?>" <?= ($r['nim'] == $row['nim']) ? 'selected' : '' ?>><?= $r['nim'] . ' | ' . $r['nama']; ?></option>
							<?php } ?>
						</select>

					</div>
					<div class="mb-4">
						<label for="edit_jenis_pelanggaran" class="block text-sm font-medium text-gray-700 mb-2">Jenis Pelanggaran:</label>
						<select id="edit_jenis_pelanggaran" required name="jenis_pelanggaran" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
							<option value="" selected disabled>--Pilih Jenis pelanggaran--</option>
							<option value="ringan" <?= ($row['jenis_pelanggaran'] == 'ringan') ? 'selected' : '' ?>>Ringan</option>
							<option value="sedang" <?= ($row['jenis_pelanggaran'] == 'sedang') ? 'selected' : '' ?>>Sedang</option>
							<option value="berat" <?= ($row['jenis_pelanggaran'] == 'berat') ? 'selected' : '' ?>>Berat</option>
							<option value="sangat berat" <?= ($row['jenis_pelanggaran'] == 'sangat berat') ? 'selected' : '' ?>>Sangat Berat</option>
						</select>

					</div>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
					<div class="mb-4">
						<label for="edit_pelanggaran" class="block text-sm font-medium text-gray-700 mb-2">Pelanggaran:</label>
						<textarea id="edit_pelanggaran" name="pelanggaran" required
							class="mt-1 bg-off-white text-black block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
							placeholder="Masukkan deskripsi pelanggaran"></textarea>
					</div>

					<div class="mb-4">
						<label for="edit_poin" class="block text-sm font-medium text-gray-700 mb-2">Poin:</label>
						<input type="number" id="edit_poin" name="poin" required
							class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
							placeholder="Masukkan poin" />
					</div>
				</div>

				<div class="mb-4">
					<label for="edit_bukti" class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Upload Bukti:</label>
					<div class="relative file-upload-container grid grid-cols-1 md:grid-cols-2 gap-4">
						<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-2 border-blue-400 border-2 border-dashed rounded-lg  w-full shadow-lg transtition">
							<div class="text-center flex flex-col gap-1 md:gap-2">
								<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
								</svg>
								<p class="text-gray-600 text-xs sm:text-sm font-semibold">
									<i class="fas fa-cloud-upload-alt"></i><span class="text-blue-600 font-bold">Upload File</span> atau Drag & Drop
								</p>
								<p class="text-xs text-gray-500 mb-2">JPG, PNG up to 5 MB</p>
							</div>

							<input id="edit_bukti" required name="bukti" accept="image/jpg, image/png, image/jpeg, image/wepb" type="file" class="file-input hidden" />

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

	<!-- Modal Hapus Etiquette -->
	<dialog id="hapusEtiket" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa]">
			<!-- Tombol close di sudut kanan atas -->
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-lg font-bold text-red-600 flex flex-row items-center">
				Hapus Kategori
				<div class="bg-red-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
					<i data-feather="trash-2" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus kategori ini?</p>
			<form method="post" action="<?= site_url('Etiquette/Etiquette_Mahasiswa/delete'); ?>">
				<?= csrf(); ?>
				<input type="hidden" id="hapus_id_etiquette" name="id_etiquette" />
				<div class="modal-action relative" style="z-index: 1000;">
					<button type="button" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
					<button type="submit" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Hapus</button>
				</div>
			</form>
		</div>
	</dialog>

</section>

<script>
	const openEditModal = (id, mhs, jenis, pelanggaran, poin, bukti) => {
		document.getElementById('edit_id_etiquette').value = id;
		document.getElementById('edit_mhs').value = mhs;
		document.getElementById('edit_pelanggaran').value = pelanggaran;
		document.getElementById('edit_jenis_pelanggaran').value = jenis;
		document.getElementById('edit_poin').value = poin;

		const filePreview = document.querySelector('#edit-file-name');
		const previewContainer = document.querySelector('#edit-preview-container');

		filePreview.textContent = bukti;

		if (bukti) {
			const imageUrl = `<?= base_url('./assets/static/Etiquette/') ?>${bukti}`;
			previewContainer.innerHTML = `<img src="${imageUrl}" class="w-full h-auto max-h-60 object-cover" alt="Preview Gambar" />`;
		} else {
			previewContainer.innerHTML = '';
		}

		document.getElementById('editEtiket').showModal();
	}


	// delete etiket
	const openDeleteModal = (id) => {
		document.getElementById('hapus_id_etiquette').value = id;
		document.getElementById('hapusEtiket').showModal();
	}
</script>
