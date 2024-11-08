<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-3xl text-xl font-bold text-blue-600 whitespace-nowrap"><?= $sub; ?></h1>
			<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg">
				<i data-feather="users" fill="currentColor" class="w-4 h-4 md:h-[24px] md:w-[24px]"></i>
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
						<i data-feather="server" class="w-4 h-auto rotate-90"></i>
						<span class="hidden md:block">
							University
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="user" class="w-4 h-auto"></i>
						<span class="hidden md:block">

							<?= ucwords($active_menu); ?>
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>
	<!-- Alert success -->
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
	<!-- table data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<!-- add user -->
		<button type="button" onclick="document.getElementById('addFakultas').showModal()" class="btn max-w-[15rem] bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 md:w-auto flex flex-row items-center">
			<div class="bg-[#faafa] md:p-3 p-2 rounded-lg">
				<i data-feather="user-plus" fill="currentColor" class="w-4 h-4"></i>
			</div>
			Tambah Fakultas
		</button>

		<div class="overflow-x-auto">
			<table id="" class="min-w-full table-auto table-data">
				<thead class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Kode Fakultas</th>
						<th class="p-2">Fakultas</th>
						<th class="p-2">Dekan Fakultas</th>
						<th class="p-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					// $mahasiswa yang diambil dari control function index
					foreach ($read as $row) { ?>
						<tr class="border-t">
							<td class="p-2"><?= $no; ?></td>
							<td class="p-2 whitespace-nowrap"><?= $row['id_fakultas']; ?></td>
							<td class="p-2 whitespace-nowrap"><?= $row['fakultas']; ?></td>
							<td class="p-2 whitespace-nowrap"><?= $row['nama']; ?></td>
							<td class="p-2 flex flex-row items-center justify-center mt-2 gap-2">
								<button type="button" onclick="openEditModal('<?= $row['id_fakultas']; ?>','<?= $row['id_dekan']; ?>','<?= $row['fakultas']; ?>')" class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
									<i data-feather="edit" class="w-4 h-auto"></i>
									<p class="hidden group-hover:block text-white transition-opacity duration-300">Edit</p>
								</button>
								<button type="button" onclick="openDeleteModal('<?= $row['id_fakultas']; ?>')" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
									<i data-feather="trash-2" class="w-4 h-auto"></i>
									<p class="hidden group-hover:block text-white transition-opacity duration-300">Hapus</p>
								</button>
							</td>
						</tr>

						<!-- modal add Fakultas -->
						<dialog id="addFakultas" class="modal overflow-hidden">
							<div class="modal-box bg-[#fafafa] mx-auto p-4">
								<!-- Tombol close di sudut kanan atas -->
								<form method="dialog">
									<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
								</form>
								<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
									Tambah Fakultas Universitas
									<div class="bg-blue-600 p-2 sm:p-3 text-[#fafafa] rounded-lg ml-2 sm:ml-4">
										<i data-feather="activity" class="w-4 h-4"></i>
									</div>
								</h3>
								<div class="divider border-gray-400"></div>
								<!-- Alert duplicate fakultas -->
								<?php if ($this->session->flashdata('create_error')): ?>
									<div role="alert" class="alert alert-warning mb-2">
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
								<form method="post" action="<?= site_url('Admin/Fakultas/save'); ?>" enctype="multipart/form-data" role="form">
									<?= csrf(); ?>
									<div class="mb-4">
										<label for="id_fakultas" class="block text-sm font-medium text-gray-700 mb-2">Kode Fakultas:</label>
										<input type="text" id="id_fakultas" name="id_fakultas" required
											class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
											placeholder="Masukkan Kode Fakultas" />
									</div>
									<div class="mb-4">
										<label for="fakultas" class="block text-sm font-medium text-gray-700 mb-2">Fakultas:</label>
										<input type="text" id="fakultas" name="fakultas" required
											class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
											placeholder="Masukkan fakultas" />
									</div>
									<div class="mb-4">
										<label for="select_dekan" class="block text-sm font-medium text-gray-700 mb-2">Dekan Fakultas:</label>
										<select id="select_dekan" required name="id_dekan" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
											<option value="" selected disabled>--Pilih Dekan Fakultas--</option>
											<?php foreach ($staff as $r) { ?>
												<option value="<?= $r['id_staff'] ?>"><?= $r['id_staff'] . ' | ' . $r['nama']; ?></option>
											<?php } ?>
										</select>
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

						<!-- Modal edit Fakultas -->
						<dialog id="editFakultas" class="modal overflow-hidden">
							<div class="modal-box bg-[#fafafa]">
								<form method="dialog">
									<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
								</form>
								<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
									Edit Fakultas Mahasiswa
									<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
										<i data-feather="activity" class="w-4 h-4"></i>
									</div>
								</h3>
								<div class="divider border-gray-400"></div>
								<!-- Alert duplicate fakultas -->
								<?php if ($this->session->flashdata('update_error')): ?>
									<div role="alert" class="alert alert-warning mb-2">
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
								<form method="post" action="<?= site_url('Admin/Fakultas/update/' . $row['id_fakultas']); ?>" enctype="multipart/form-data" role="form">
									<?= csrf(); ?>
									<div class="mb-4">
										<label for="fakultas_id" class="block text-sm font-medium text-gray-700 mb-2">Kode Fakultas:</label>
										<input type="text" id="fakultas_id" name="id_fakultas" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2 cursor-not-allowed" readonly />
									</div>
									<div class="mb-4">
										<label for="fakultas_univ" class="block text-sm font-medium text-gray-700 mb-2">Fakultas:</label>
										<input type="text" id="fakultas_univ" name="fakultas" required
											class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
											placeholder="Masukkan fakultas" />
									</div>
									<div class="mb-4">
										<label for="dekan" class="block text-sm font-medium text-gray-700 mb-2">Dekan Fakultas:</label>
										<select id="dekan" name="id_dekan" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
											<option value="" selected disabled>--Pilih Dekan Fakultas--</option>
											<?php foreach ($staff as $r) { ?>
												<option value="<?= $r['id_staff'] ?>" <?= ($r['id_staff'] == $row['id_staff']) ? 'selected' : '' ?>><?= $r['id_staff'] . ' | ' . $r['nama']; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="modal-action relative" style="z-index: 1000;">
										<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
										<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Update</button>
									</div>
								</form>
							</div>
						</dialog>

						<!-- Modal Hapus Fakultas -->
						<dialog id="hapusFakultas" class="modal overflow-hidden">
							<div class="modal-box bg-[#fafafa]">
								<!-- Tombol close di sudut kanan atas -->
								<?= csrf(); ?>
								<form method="dialog">
									<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
								</form>
								<h3 class="text-lg font-bold text-red-600 flex flex-row items-center">
									Hapus Data
									<div class="bg-red-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
										<i data-feather="trash-2" class="w-4 h-4"></i>
									</div>
								</h3>
								<div class="divider border-gray-400"></div>
								<p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus Data ini?</p>
								<form method="post" action="<?= site_url('Admin/Fakultas/delete/'); ?>">
									<?= csrf(); ?>
									<input id="id" type="text" name="id_fakultas">
									<div class="modal-action relative" style="z-index: 1000;">
										<button type="button" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
										<button type="submit" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Hapus</button>
									</div>
								</form>
							</div>
						</dialog>
					<?php
						$no++;
					}
					?>
				</tbody>
				<tfoot class="bg-gray-100">
					<tr>
						<th class="p-2">No</th>
						<th class="p-2">Kode Fakultas</th>
						<th class="p-2">Fakultas</th>
						<th class="p-2">Dekan Fakultas</th>
						<th class="p-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>

	</section>

</section>
<script>
	const openEditModal = (id, staff, fakultas) => {
		document.getElementById('fakultas_id').value = id;
		document.getElementById('fakultas_univ').value = fakultas;

		const dataStaff = document.getElementById('dekan');
		dataStaff.value = staff;
		dataStaff.dispatchEvent(new Event('change'));

		document.getElementById('editFakultas').showModal();
	}
	const openDeleteModal = (id) => {
		document.getElementById('id').value = id;
		document.getElementById('hapusFakultas').showModal();
	}

	if (<?= json_encode($this->session->flashdata('create_error') ? true : false); ?>) {
		document.getElementById('addFakultas').showModal();
	}
	if (<?= json_encode($this->session->flashdata('update_error') ? true : false); ?>) {
		document.getElementById('editFakultas').showModal();
	}
</script>
