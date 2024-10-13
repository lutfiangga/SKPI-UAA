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

	<!-- table data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<div class="flex justify-between">
			<!-- add user -->
			<a href="<?= site_url('Mahasiswa/Spm_Mahasiswa/create'); ?>" class="btn justify-start bg-blue-600 border-none text-[#fafafa] mb-4 flex flex-row items-center w-fit">
				<i data-feather="upload-cloud" class="w-4 h-4"></i>
				Upload SPM
			</a>
			<div class="dropdown justify-end dropdown-bottom dropdown-end">
				<div tabindex="0" role="button" class="btn m-1 bg-[#fafafa] text-blue-600 border-none shadow-md hover:bg-blue-600 hover:text-[#fafafa]">Export SPM</div>
				<ul tabindex="0" class="dropdown-content menu bg-[#fafafa] rounded-box z-[1] w-52 p-2 shadow">
					<li>
						<a href="<?= site_url('Mahasiswa/Spm_Mahasiswa/print'); ?>" class="bg-[#fafafa] text-blue-600 rounded-lg px-2 duration-300 hover:bg-blue-600 hover:text-[#fafafa] flex flex-row items-center">
							<i data-feather="printer" class="w-4 h-4"></i>
							Print
						</a>
					</li>
					<li>
						<a href="<?= base_url('Mahasiswa/Spm_Mahasiswa/export_pdf'); ?>" class="bg-[#fafafa] text-blue-600 rounded-lg px-2 duration-300 hover:bg-blue-600 hover:text-[#fafafa] flex flex-row items-center">
							<i data-feather="file-text" class="w-4 h-4"></i>
							Export to PDF
						</a>
					</li>
				</ul>
			</div>

		</div>

		<div class="overflow-x-auto">
			<table class="min-w-full table-auto table-info">
				<thead class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Nama Kegiatan</th>
						<th class="p-2">Kategori</th>
						<th class="p-2">Poin</th>
						<th class="p-2">Tanggal</th>
						<th class="p-2">Sertifikat</th>
						<th class="p-2">Link Kegiatan</th>
						<th class="p-2">Foto Kegiatan</th>
						<th class="p-2">Surat Tugas</th>
						<th class="p-2">Penyelenggara</th>
						<th class="p-2">Status</th>
						<th class="p-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($read as $row) {
						if ($row['nim'] == $this->session->userdata('id_user')) {
					?>
							<tr class="border-t">
								<td class="p-2">
									<?= $no; ?>
								<td class="p-2 whitespace-normal"><?= $row['nama_kegiatan'] ?></td>
								<td class="p-2 whitespace-normal"><?= $row['nama_kategori'] ?></td>
								<td class="p-2 whitespace-nowrap">
									<span class="flex items-center cursor-default text-sm gap-2 text-green-600 hover:bg-lavender-gray py-2 rounded-full">
										<i data-feather="check-circle" class="w-4 h-auto"></i>
										<?= $row['poin'] ?> Poin
									</span>
								</td>
								<td class="p-2 whitespace-normal">
									<?= tanggal($row['tanggal_mulai']) ?>
									<?= isset($row['tanggal_selesai']) ? 's/d ' . tanggal($row['tanggal_selesai']) : '' ?>
								</td>

								<td class="p-2">
									<?php if (!empty($row['sertifikat'])) : ?>
										<a href="<?= base_url('assets/static/spm/pdf/sertifikat/' . $row['sertifikat']); ?>" download class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="file-text" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-normal"><?= $row['sertifikat']; ?></p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2">
									<?php if (!empty($row['link_kegiatan'])) : ?>
										<a href="<?= $row['link_kegiatan']; ?>" target="_blank" class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="link-2" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-normal"><?= $row['link_kegiatan']; ?></p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2">
									<?php if (!empty($row['foto_kegiatan'])) : ?>
										<a href="<?= base_url('assets/static/spm/img/foto_kegiatan/' . $row['foto_kegiatan']); ?>" download class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="image" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-normal"><?= $row['foto_kegiatan']; ?></p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2">
									<?php if (!empty($row['surat_tugas'])) : ?>
										<a href="<?= base_url('assets/static/spm/pdf/surat_tugas/' . $row['surat_tugas']); ?>" download class="flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-[#EEF0F6] cursor-pointer">
											<div>
												<div class="rounded-md text-[#fafafa] bg-blue-600 p-2">
													<i data-feather="file-text" class="w-6 h-auto"></i>
												</div>
											</div>
											<p class="text-sm max-w-full font-thin truncate whitespace-normal"><?= $row['surat_tugas']; ?></p>
										</a>
									<?php endif; ?>
								</td>
								<td class="p-2 whitespace-normal"><?= $row['penyelenggara'] ?></td>
								<td>
									<?php if ($row['status'] == 'pending') : ?>
										<span class="flex items-center text-sm gap-2 text-orange-600 hover:bg-[#EEF0F6] p-2 rounded-full">
											<i data-feather="alert-circle" class="w-4 h-auto"></i>
											On Review
										</span>
									<?php elseif ($row['status'] == 'diterima') : ?>
										<span class="flex items-center text-sm gap-2 text-green-600 hover:bg-[#EEF0F6] p-2 rounded-full">
											<i data-feather="check-circle" class="w-4 h-auto"></i>
											Verified
										</span>
									<?php elseif ($row['status'] == 'ditolak') : ?>
										<span class="flex items-center text-sm gap-2 text-red-600 hover:bg-[#EEF0F6] p-2 rounded-full">
											<i data-feather="x-circle" class="w-4 h-auto"></i>
											Unverified
										</span>
									<?php endif; ?>
								</td>
								<td class="p-2 flex flex-row items-center mt-2 gap-2">
									<?php if ($row['status'] == 'pending'): ?>
										<a href="<?= site_url('Mahasiswa/Spm_Mahasiswa/edit/' . $row['id_spm']); ?>" class="bg-orange-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
											<i data-feather="edit" class="w-4 h-auto"></i>
											<p class="hidden group-hover:block text-white transition-opacity duration-300">Edit</p>
										</a>
										<button type="button" onclick="openDeleteModal(<?= $row['id_spm']; ?>)" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
											<i data-feather="trash-2" class="w-4 h-auto"></i>
											<p class="hidden group-hover:block text-white transition-opacity duration-300">Hapus</p>
										</button>
									<?php else: ?>
										<p class="text-xs text-gray-400 whitespace-normal mt-3">
											<?= (!empty(trim($row['keterangan']))) ? 'Keterangan: ' . $row['keterangan'] : 'No action needed'; ?>
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
						<th class="p-2">Nama Kegiatan</th>
						<th class="p-2">Kategori</th>
						<th class="p-2">Poin</th>
						<th class="p-2">Tanggal</th>
						<th class="p-2">Sertifikat</th>
						<th class="p-2">Link Kegiatan</th>
						<th class="p-2">Foto Kegiatan</th>
						<th class="p-2">Surat Tugas</th>
						<th class="p-2">Penyelenggara</th>
						<th class="p-2">Status</th>
						<th class="p-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>

	</section>

	<!-- Modal Hapus Spm -->
	<dialog id="hapusSpm" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa]">
			<!-- Tombol close di sudut kanan atas -->
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-lg font-bold text-red-600 flex flex-row items-center">
				Hapus SPM
				<div class="bg-red-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
					<i data-feather="trash-2" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus SPM ini?</p>
			<form method="post" action="<?= site_url('Mahasiswa/Spm_Mahasiswa/delete'); ?>">
				<?= csrf(); ?>
				<input type="hidden" id="hapus_id_spm" name="id_spm" />
				<div class="modal-action relative" style="z-index: 1000;">
					<button type="button" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
					<button type="submit" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Hapus</button>
				</div>
			</form>
		</div>
	</dialog>

</section>
<script>
	// delete spm
	const openDeleteModal = (id) => {
		document.getElementById('hapus_id_spm').value = id;
		document.getElementById('hapusSpm').showModal();
	}
</script>
