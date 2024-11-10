<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-2xl sm:text-xl lg:text-3xl text-md font-bold text-blue-600 whitespace-nowrap capitalize"><span class="flex flex-row items-center gap-2">
					<p class="block">
						<?= $sub; ?>
					</p>
					<p class="hidden md:block">
						Saya
					</p>
				</span>
			</h1>
			<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg">
				<i data-feather="settings" class="w-4 h-4 sm:h-[20px] sm:w-[20px] md:h-[24px] md:w-[24px]"></i>
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
						<i data-feather="user" class="w-4 h-auto"></i>
						<span class="hidden md:block capitalize">
							<?= $role; ?>
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="settings" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							Setings
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>

	<!-- Content Profile-->
	<div class="w-full mx-auto p-6 bg-white rounded-2xl shadow-sm md:shadow-md lg:shadow-lg">
		<!-- Tabs -->
		<div class="flex justify-end border-b mb-4">
			<button class="px-4 py-2 text-xs sm:text-sm md:text-base gap-2 tab-biodata text-blue-600 border-b-2 flex flex-row items-center border-blue-600 focus:outline-none">
				<i data-feather="info" class="w-4 h-auto"></i> Biodata
			</button>
			<button class="px-4 py-2 text-xs sm:text-sm md:text-base gap-2 tab-password text-gray-600 border-b-2 flex flex-row items-center focus:outline-none">
				<i data-feather="lock" class="w-4 h-auto"></i> Update Password
			</button>
		</div>

		<!-- Tab Content -->
		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
			<!-- Profile Picture -->
			<div class="relative">
				<div class="avatar flex justify-center items-center">
					<div class="mask mask-squircle w-3/4">
						<img src="<?= base_url($foto) ?>" alt="Profile Picture" />
					</div>
				</div>
				<!-- update image-button -->
				<div class="absolute top-0 right-4 z-20">
					<button onclick="editImage.showModal()" class="p-2 sm:p-2.5 md:p-3 rounded-lg bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md w-full md:w-auto flex flex-row items-center">
						<div class="bg-[#faafa] rounded-lg">
							<i data-feather="edit" class="w-4 h-4"></i>
						</div>
					</button>
				</div>

			</div>

			<!-- Content Profile-->
			<div class="md:col-span-2">
				<!-- Alert success -->
				<?php if ($this->session->flashdata('update_profile_success')): ?>
					<div role="alert" class="alert alert-success mb-2">
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
						<span> <?= $this->session->flashdata('update_profile_success'); ?></span>
					</div>
				<?php endif; ?>
				<!-- Biodata Tab Content -->
				<div class="content-biodata">
					<form method="POST" action="<?= site_url(ucwords($role) . '/Myprofile/update'); ?>" enctype="multipart/form-data" class="grid grid-cols-2 gap-2 md:gap-4 ">
						<?= csrf(); ?>
						<div class="text-xs sm:text-sm md:text-base whitespace-normal">
							<label class="font-semibold text-gray-700">Nama:</label>
							<input type="text" id="nama" name="nama" value="<?= $profile['nama']; ?>" class="mt-1 capitalize block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2" />
						</div>
						<div class="text-xs sm:text-sm md:text-base whitespace-normal">
							<label class="font-semibold text-gray-700">Jenis Kelamin:</label>
							<div class="flex gap-2 mt-2">
								<div class="flex items-center">
									<input id="Laki-laki" name="jenis_kelamin" <?= ($profile['jenis_kelamin'] == 'Laki-laki') ? 'checked' : '' ?> type="radio" value="Laki-laki" class="radio radio-primary" />
									<label for="Laki-laki" class="ml-2 block text-sm font-medium text-gray-700">Laki-Laki</label>
								</div>
								<div class="flex items-center">
									<input id="Perempuan" name="jenis_kelamin" <?= ($profile['jenis_kelamin'] == 'Perempuan') ? 'checked' : '' ?> type="radio" value="Perempuan" class="radio radio-primary" />
									<label for="Perempuan" class="ml-2 block text-sm font-medium text-gray-700">Perempuan</label>
								</div>
							</div>
						</div>
						<div class="text-xs sm:text-sm md:text-base">
							<label class="font-semibold text-gray-700">Tempat Lahir:</label>
							<input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= $profile['tempat_lahir']; ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2" />
						</div>
						<div class="text-xs sm:text-sm md:text-base">
							<label for="tanggal_lahir" class="mb-2 text-sm font-medium text-gray-700">Tanggal Lahir:</label>
							<input id="tanggal_lahir" type="text" name="tgl_lahir" value="<?= $profile['tgl_lahir']; ?>"
								class="pickdate p-2 w-full rounded-md bg-[#fafafa] focus:ring-inset focus:ring-blue-400 border border-gray-300"
								placeholder="YYYY/MM/DD">
						</div>
						<div class="text-xs sm:text-sm md:text-base">
							<label class="font-semibold text-gray-700">Telepon:</label>
							<input type="number" inputmode="numeric" id="phone" name="phone" value="<?= $profile['phone']; ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2" />
						</div>
						<div class="text-xs sm:text-sm md:text-base">
							<label class="font-semibold text-gray-700">Email:</label>
							<input type="text" id="email" name="email" value="<?= $profile['email']; ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2" />
						</div>
						<div class="text-xs sm:text-sm md:text-base">
							<label class="font-semibold text-gray-700">Semester:</label>
							<input type="text" id="semester" disabled value="Semester <?= $profile['semester']; ?>" class="mt-1 cursor-not-allowed block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2" />
						</div>
						<div class="text-xs sm:text-sm md:text-base">
							<label class="font-semibold text-gray-700">Program Studi:</label>
							<input type="text" id="prodi" disabled value="<?= $profile['prodi']; ?>" class="mt-1 capitalize cursor-not-allowed block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2" />
						</div>
						<div class="text-xs sm:text-sm md:text-base col-span-2">
							<label class="font-semibold text-gray-700">Fakultas:</label>
							<input type="text" id="fakultas" disabled value="<?= $profile['fakultas']; ?>" class="mt-1 capitalize cursor-not-allowed block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2" />
						</div>
						<div class="divider border-gray-400"></div>
						<div class="flex justify-end">
							<button type="submit"
								class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Update</button>
						</div>
					</form>
				</div>

				<!-- Update Password Tab Content -->
				<div class="hidden space-y-4 content-password">
					<!-- Alert no input form -->
					<?php if ($this->session->flashdata('validation_error')): ?>
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
							<span> <?= $this->session->flashdata('validation_error'); ?></span>
						</div>
					<?php endif; ?>
					<!-- Alert wrong input -->
					<?php if ($this->session->flashdata('error')): ?>
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
									d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
							<span> <?= $this->session->flashdata('error'); ?></span>
						</div>
					<?php endif; ?>
					<!-- Alert success -->
					<?php if ($this->session->flashdata('success')): ?>
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
							<span> <?= $this->session->flashdata('success'); ?></span>
						</div>
					<?php endif; ?>
					<form class="flex flex-col gap-2 text-xs sm:text-sm md:text-base" action="<?= site_url(ucwords($role) . '/Myprofile/update_password'); ?>" method="POST" enctype="multipart/form-data">
						<?= csrf(); ?>
						<div>
							<label for="current-password" class="block text-xs sm:text-sm md:text-base font-medium text-gray-700">Current Password:</label>
							<div class="flex flex-row w-full mt-1">
								<input type="password" id="current-password" name="current_password" required oninput="inputValidation(this)"
									class="block w-full border border-gray-300 rounded-l-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2 pr-10 password"
									placeholder="Masukkan password" autocomplete="current-password" />
								<button type="button" class="flex items-center p-2 bg-blue-600 rounded-r-md text-white hover:bg-blue-500 focus:outline-none togglePassword" onclick="showPassword()">
									<i data-feather="eye" class="h-4 w-4 iconShow"></i>
									<i data-feather="eye-off" class="h-4 w-4 hidden iconHide"></i>
								</button>
							</div>
						</div>
						<div>
							<label for="new-password" class="block text-xs sm:text-sm md:text-base font-medium text-gray-700">New Password:</label>
							<div class="flex flex-row w-full mt-1">
								<input type="password" id="new-password" name="new_password" required oninput="inputValidation(this)"
									class="block w-full border border-gray-300 rounded-l-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2 pr-10 password"
									placeholder="Masukkan password" autocomplete="new-password" />
								<button type="button" class="flex items-center p-2 bg-blue-600 rounded-r-md text-white hover:bg-blue-500 focus:outline-none togglePassword" onclick="showPassword()">
									<i data-feather="eye" class="h-4 w-4 iconShow"></i>
									<i data-feather="eye-off" class="h-4 w-4 hidden iconHide"></i>
								</button>
							</div>
							<p id="new-passwordError" class="text-red-500 text-xs sm:text-sm md:text-base mt-2 hidden">Password harus memiliki minimal 6 karakter, mengandung huruf besar, huruf kecil, dan angka dan tidka boleh sama dengan password sekarang!</p>
						</div>
						<div>
							<label for="confirm-password" class="block text-xs sm:text-sm md:text-base font-medium text-gray-700">Confirm Password:</label>
							<div class="flex flex-row w-full mt-1">
								<input type="password" id="confirm-password" name="confirm_password" required oninput="inputValidation(this)"
									class="block password w-full border border-gray-300 rounded-l-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2 pr-10 password"
									placeholder="Masukkan password" autocomplete="confirm-password" />
								<button type="button" class="flex items-center p-2 bg-blue-600 rounded-r-md text-white hover:bg-blue-500 focus:outline-none togglePassword" onclick="showPassword()">
									<i data-feather="eye" class="h-4 w-4 iconShow"></i>
									<i data-feather="eye-off" class="h-4 w-4 hidden iconHide"></i>
								</button>
							</div>
							<p id="confirm-passwordError" class="text-red-500 text-xs sm:text-sm md:text-base mt-2 hidden">Confirm password tidak sama!</p>
						</div>
						<button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg disabled:bg-gray-300">Update Password</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- modal edit Image -->
	<dialog id="editImage" class="modal overflow-hidden">
		<div class="modal-box bg-[#fafafa]">
			<!-- Tombol close di sudut kanan atas -->
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
			</form>
			<h3 class="text-xs sm:text-sm md:text-base font-bold text-blue-600 flex flex-row items-center">
				Ubah Foto Profile
				<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
					<i data-feather="image" class="w-4 h-4"></i>
				</div>
			</h3>
			<div class="divider border-gray-400"></div>
			<form method="post" action="<?= site_url(ucwords($role) . '/Myprofile/change_profile_picture/') . $id_user; ?>" enctype="multipart/form-data" role="form">
				<?= csrf(); ?>
				<div class="mb-4">
					<label for="file" class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Upload Foto:</label>
					<div class="relative file-upload-container">
						<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-blue-400 border-2 border-dashed rounded-lg w-full shadow-lg transtition">
							<div class="text-center flex flex-col gap-1 md:gap-2">
								<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
								</svg>
								<p class="text-gray-600 text-xs sm:text-sm font-semibold">
									<i class="fas fa-cloud-upload-alt"></i><span class="text-blue-600 font-bold">Upload File</span> atau Drag & Drop
								</p>
								<p class="text-xs text-gray-500 mb-2">JPG, PNG up to 5 MB</p>
							</div>

							<input id="file" name="img_user" accept="image/jpg, image/png, image/jpeg, image/wepb" type="file" class="file-input hidden" />

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
					<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
					<button type="submit" class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
				</div>
			</form>
		</div>
	</dialog>

</section>
