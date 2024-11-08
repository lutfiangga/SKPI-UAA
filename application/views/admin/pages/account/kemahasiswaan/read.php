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
						<i data-feather="lock" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							Account
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

	<!-- table data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<!-- add user -->
		<button type="button" onclick="document.getElementById('addAkun').showModal()" class="btn max-w-[15rem] bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 md:w-auto flex flex-row items-center">
			<div class="bg-[#faafa] md:p-3 p-2 rounded-lg">
				<i data-feather="user-plus" fill="currentColor" class="w-4 h-4"></i>
			</div>
			Tambah Akun
		</button>

		<div class="overflow-x-auto">
			<table id="" class="min-w-full table-auto table-data">
				<thead class="bg-gray-100">
					<tr>
						<th class="px-4 py-2">No</th>
						<th class="px-4 py-2">Nama</th>
						<th class="px-4 py-2">Username</th>
						<th class="px-4 py-2">Email</th>
						<th class="px-4 py-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($read as $row) {
						// Tentukan gambar berdasarkan $row['img_user'] dan $role
						$role_folder = 'assets/static/img/photos/' . strtolower($row['role']) . '/';
						$staff_folder = 'assets/static/img/photos/staff/';
						$default_image = 'assets/static/img/user.png';

						$img_user = !empty($row['img_user']) && file_exists($role_folder . $row['img_user']) ? $role_folder . $row['img_user'] : (!empty($row['img_user']) && ($staff_folder . $row['img_user']) ? $staff_folder . $row['img_user'] : $default_image);

					?>
						<tr class="border-t">
							<td class="px-4 py-2"><?= $no; ?></td>
							<td class="px-4 py-2">
								<div class="flex flex-row gap-2 items-center">
									<img src="<?= base_url($img_user); ?>" alt="<?= $row['role']; ?>" class="rounded-full w-8 h-8">
									<div class="flex flex-col items-center justify-center">
										<p class="truncate w-full ml-2 font-semibold"><?= $row['nama'] ?></p>
										<p class="truncate w-full ml-2 text-[0.6rem] tracking-wide uppercase"><?= $row['id_staff']; ?></p>
									</div>
								</div>
							</td>
							<td class="px-4 py-2 whitespace-nowrap"><?= $row['username']; ?></td>
							<td class="px-4 py-2 whitespace-nowrap"><?= $row['email']; ?></td>
							<td class="px-4 py-2 flex flex-row items-center justify-center mt-2 gap-2">
								<button type="button" onclick="openEditModal('<?= $row['id_akun']; ?>','<?= $row['id_user']; ?>','<?= $row['username']; ?>','<?= $row['role']; ?>')" class="bg-green-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
									<i data-feather="edit" class="w-4 h-auto"></i>
									<p class="hidden group-hover:block text-white transition-opacity duration-300">Edit</p>
								</button>
								<button type="button" onclick="openDeleteModal('<?= $row['id_akun']; ?>')" class="bg-red-600 rounded-full p-2 text-[#fafafa] hover:px-4 flex items-center gap-2 group">
									<i data-feather="trash-2" class="w-4 h-auto"></i>
									<p class="hidden group-hover:block text-white transition-opacity duration-300">Hapus</p>
								</button>
							</td>
						</tr>

						<!-- modal add Akun -->
						<dialog id="addAkun" class="modal overflow-hidden">
							<div class="modal-box bg-[#fafafa] w-full sm:w-11/12 lg:max-w-5xl mx-auto p-4">
								<!-- Tombol close di sudut kanan atas -->
								<form method="dialog">
									<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
								</form>
								<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
									Tambah Akun Admin
									<div class="bg-blue-600 p-2 sm:p-3 text-[#fafafa] rounded-lg ml-2 sm:ml-4">
										<i data-feather="activity" class="w-4 h-4"></i>
									</div>
								</h3>
								<div class="divider border-gray-400"></div>
								<!-- Alert duplicate Username -->
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
								<form method="post" action="<?= site_url('Admin/Account/Kemahasiswaan/save'); ?>" enctype="multipart/form-data" role="form">
									<?= csrf(); ?>
									<div class="mb-4">
										<label for="select_staff" class="block text-sm font-medium text-gray-700 mb-2">Pegawai/Dosen:</label>
										<select id="select_staff" name="id_user" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
											<option value="" selected disabled>--Pilih Pegawai/Dosen--</option>
											<?php foreach ($staff as $r) { ?>
												<option value="<?= $r['id_staff'] ?>"><?= $r['id_staff'] . ' | ' . $r['nama']; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
									</div>
									<div class="mb-4">
										<label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username:</label>
										<input type="text" id="username" name="username" required oninput="inputValidation(this)"
											class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
											placeholder="Masukkan username" />
										<p id="usernameError" class="text-red-500 mt-2 text-xs lg:text-sm hidden">Username harus minimal 3 karakter dan hanya mengandung huruf.</p>
									</div>
									<div class="mb-4">
										<label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password:</label>
										<div class="flex flex-row w-full mt-1">
											<input type="password" id="password" name="password" oninput="inputValidation(this)"
												class="block w-full border border-gray-300 rounded-l-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2 pr-10 password"
												placeholder="Masukkan password" autocomplete="password" />
											<button type="button" class="flex items-center p-2 bg-blue-600 rounded-r-md text-white hover:bg-blue-500 focus:outline-none togglePassword" onclick="showPassword()">
												<i data-feather="eye" class="h-4 w-4 iconShow"></i>
												<i data-feather="eye-off" class="h-4 w-4 hidden iconHide"></i>
											</button>
										</div>
										<p id="passwordError" class="text-red-500 text-xs lg:text-sm mt-2 hidden">Password harus memiliki minimal 6 karakter, mengandung huruf besar, huruf kecil, dan angka.</p>
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

						<!-- Modal edit Akun -->
						<dialog id="editAkun" class="modal overflow-hidden">
							<div class="modal-box bg-[#fafafa] w-11/12 max-w-5xl">
								<form method="dialog">
									<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
								</form>
								<h3 class="text-lg font-bold text-blue-600 flex flex-row items-center">
									Edit Akun Admin
									<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
										<i data-feather="activity" class="w-4 h-4"></i>
									</div>
								</h3>
								<div class="divider border-gray-400"></div>
								<!-- Alert duplicate Username -->
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
								<form method="post" action="<?= site_url('Admin/Account/Kemahasiswaan/update/' . $row['id_akun']); ?>" enctype="multipart/form-data" role="form">
									<?= csrf(); ?>
									<input type="text" id="id_akun" name="id_akun" hidden />
									<div class="mb-4">
										<label for="staff" class="block text-sm font-medium text-gray-700 mb-2">Pegawai/Dosen:</label>
										<select id="staff" name="id_user" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
											<option value="" selected disabled>--Pilih Pegawai/Dosen--</option>
											<?php foreach ($staff as $r) { ?>
												<option value="<?= $r['id_staff'] ?>" <?= ($r['id_staff'] == $row['id_staff']) ? 'selected' : '' ?>><?= $r['id_staff'] . ' | ' . $r['nama']; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
									</div>
									<div class="mb-4">
										<label for="user" class="block text-sm font-medium text-gray-700 mb-2">Username:</label>
										<input type="text" id="user" name="username" required oninput="inputValidation(this)"
											class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
											placeholder="Masukkan username" />
										<p id="userError" class="text-red-500 mt-2 text-xs lg:text-sm hidden">Username harus minimal 3 karakter dan hanya mengandung huruf.</p>
									</div>
									<div class="mb-4">
										<label for="pwd" class="block text-sm font-medium text-gray-700 mb-2">Password:</label>
										<div class="flex flex-row w-full mt-1">
											<input type="password" id="pwd" name="password" oninput="inputValidation(this)"
												class="block w-full border border-gray-300 rounded-l-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2 pr-10 password"
												placeholder="Masukkan password" autocomplete="password" />
											<button type="button" class="flex items-center p-2 bg-blue-600 rounded-r-md text-white hover:bg-blue-500 focus:outline-none togglePassword" onclick="showPassword()">
												<i data-feather="eye" class="h-4 w-4 iconShow"></i>
												<i data-feather="eye-off" class="h-4 w-4 hidden iconHide"></i>
											</button>
										</div>
										<p id="pwdError" class="text-red-500 text-xs lg:text-sm mt-2 hidden">Password harus memiliki minimal 6 karakter, mengandung huruf besar, huruf kecil, dan angka.</p>
									</div>
									<div class="mb-4">
										<label for="role" class="block text-sm font-medium text-gray-700 mb-2">Role Akun:</label>
										<select id="role" required name="role" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
											<option value="" selected disabled>--Pilih Role Akun--</option>
											<option value="admin" <?= ($row['role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
											<option value="admisi" <?= ($row['role'] == 'admisi') ? 'selected' : '' ?>>Admisi</option>
											<option value="prodi" <?= ($row['role'] == 'prodi') ? 'selected' : '' ?>>Prodi</option>
											<option value="kemahasiswaan" <?= ($row['role'] == 'kemahasiswaan') ? 'selected' : '' ?>>Kemahasiswaan</option>
											<option value="etiquette" <?= ($row['role'] == 'etiquette') ? 'selected' : '' ?>>Etiquette</option>
											<option value="mahasiswa" <?= ($row['role'] == 'mahasiswa') ? 'selected' : '' ?>>Mahasiswa</option>
										</select>
									</div>
									<div class="modal-action relative" style="z-index: 1000;">
										<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
										<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Update</button>
									</div>
								</form>
							</div>
						</dialog>

						<!-- Modal Hapus Akun -->
						<dialog id="hapusAkun" class="modal overflow-hidden">
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
								<form method="post" action="<?= site_url('Admin/Account/Kemahasiswaan/delete/'); ?>">
									<?= csrf(); ?>
									<input id="id" type="text" name="id_akun" hidden>
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
						<th class="px-4 py-2">No</th>
						<th class="px-4 py-2">Nama</th>
						<th class="px-4 py-2">Username</th>
						<th class="px-4 py-2">Email</th>
						<th class="px-4 py-2">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>

	</section>

</section>
<script>
	const openEditModal = (id, id_staff, username, role) => {
		document.getElementById('id_akun').value = id;
		document.getElementById('user').value = username;
		document.getElementById('role').value = role;

		const dataStaff = document.getElementById('staff');
		dataStaff.value = id_staff;
		dataStaff.dispatchEvent(new Event('change'));

		document.getElementById('editAkun').showModal();
	};

	const openDeleteModal = (id) => {
		document.getElementById('id').value = id;
		document.getElementById('hapusAkun').showModal();
	}

	if (<?= json_encode($this->session->flashdata('create_error') ? true : false); ?>) {
		document.getElementById('addAkun').showModal();
	}
	if (<?= json_encode($this->session->flashdata('update_error') ? true : false); ?>) {
		document.getElementById('editAkun').showModal();
	}
</script>
