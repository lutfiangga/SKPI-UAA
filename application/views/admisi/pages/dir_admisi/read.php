<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-2xl sm:text-xl lg:text-3xl text-md font-bold text-blue-600 whitespace-nowrap capitalize"><span class="flex flex-row items-center gap-2">
					<p class="block truncate whitespace-wrap">
						<?= $sub; ?>
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

	<?php if (empty($direktur)): ?>
		<button onclick="addDirektur.showModal()" class="bg-blue-600 rounded-full text-[#fafafa] p-4 text-sm flex items-center gap-2 group">
			<i data-feather="user-plus" class="w-4 h-auto"></i>
			<p class="ext-white transition-opacity duration-300">Tambah Direktur</p>
		</button>
	<?php else: ?>
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

		<!-- Content Profile-->
		<div class="w-full mx-auto p-6 bg-white rounded-2xl shadow-sm md:shadow-md lg:shadow-lg">
			<!-- Biodata Tab Content -->
			<div class="flex justify-end border-b mb-4 gap-2">
				<div class="flex flex-row items-center justify-end">
					<button onclick="changeDirektur.showModal()" class="bg-orange-600 rounded-lg p-2.5 text-sm mb-2 text-[#fafafa] flex items-center gap-2">
						<i data-feather="edit" class="w-4 h-auto"></i>
						<p class="text-white transition-opacity duration-300">Ganti Direktur</p>
					</button>
				</div>
			</div>

			<!-- Tab Content -->
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
				<!-- Profile Picture -->
				<div class="relative">
					<div class="avatar flex justify-center items-center">
						<div class="mask mask-squircle w-3/4">
							<img src="<?= base_url(!empty($direktur['img_user']) ? 'assets/static/img/photos/staff/' . $direktur['img_user'] : 'assets/static/img/user.png') ?>" />
						</div>
					</div>
				</div>

				<!-- Content Profile-->
				<div class="md:col-span-2">

					<div class="space-y-2 grid grid-cols-2 gap-2 md:gap-4">
						<div class="text-xs sm:text-sm md:text-base">
							<label class="font-semibold text-gray-700">Nama:</label>
							<p class="capitalize whitespace-normal"><?= $direktur['nama']; ?></p>
						</div>
						<div class="text-xs sm:text-sm md:text-base">
							<label class="font-semibold text-gray-700">Telepon:</label>
							<p><?= $direktur['phone']; ?></p>
						</div>
						<div class="text-xs sm:text-sm md:text-base">
							<label class="font-semibold text-gray-700">Email:</label>
							<p><?= $direktur['email']; ?></p>
						</div>
						<div class="text-xs sm:text-sm md:text-base">
							<label class="font-semibold text-gray-700">Jenis Kelamin:</label>
							<p><?= $direktur['jenis_kelamin']; ?></p>
						</div>
						<div class="text-xs sm:text-sm md:text-base">
							<label class="font-semibold text-gray-700 whitespace-normal">Jabatan:</label>
							<p>Direktur Admisi</p>
						</div>
						<!-- <div class="text-xs sm:text-sm md:text-base">
							<label class="font-semibold text-gray-700">Alamat:</label>
							<p class="whitespace-normal"><?= $direktur['alamat']; ?></p>
						</div> -->
						<div class="mb-4">
							<label class=" text-gray-700 flex flex-row gap-2 items-center font-medium">Tanda Tangan:
								<button onclick="editSignature.showModal()" class="text-blue-600 w-auto flex flex-row items-center">
									<div class="bg-[#faafa] rounded-lg">
										<i data-feather="edit" class="w-4 h-4"></i>
									</div>
								</button>
							</label>
							<div class="relative max-w-24 md:max-w-36">
								<div class="avatar flex justify-center items-center">
									<div class="w-3/4">
										<img src="<?= base_url('assets/static/img/photos/admisi/signature/' . $direktur['signature']) ?>" alt="signature" />
									</div>
								</div>
							</div>
						</div>

						<div class="mb-4">
							<label class="text-gray-700 flex flex-row gap-2 items-center font-medium">Cap:
								<button onclick="editStamp.showModal()" class="text-blue-600 w-auto flex flex-row items-center">
									<div class="bg-[#faafa] rounded-lg">
										<i data-feather="edit" class="w-4 h-4"></i>
									</div>
								</button>
							</label>
							<div class="relative max-w-24 md:max-w-36">
								<div class="avatar flex justify-center items-center">
									<div class="w-3/4">
										<img src="<?= base_url('assets/static/img/photos/admisi/stamp/' . $direktur['stamp']) ?>" alt="stamp" />
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<!-- modal -->
	<?php if (empty($direktur)): ?>
		<!-- modal tambah direktur -->
		<dialog id="addDirektur" class="modal overflow-hidden">
			<div class="modal-box bg-[#fafafa]">
				<!-- Tombol close di sudut kanan atas -->
				<form method="dialog">
					<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
				</form>
				<h3 class="text-xs sm:text-sm md:text-base font-bold text-blue-600 flex flex-row items-center">
					Tambah Direktur Admisi
					<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
						<i data-feather="image" class="w-4 h-4"></i>
					</div>
				</h3>
				<div class="divider border-gray-400"></div>
				<form method="post" action="<?= site_url(ucwords($role) . '/Dir_Admisi/add_direktur/') ?>" enctype="multipart/form-data" role="form">
					<?= csrf(); ?>
					<div class="mb-4">
						<label for="direktur" class="block text-sm font-medium text-gray-700 mb-2">Direktur Admisi:</label>
						<select id="direktur" name="id_direktur" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
							<option value="" selected disabled>--Pilih Direktur--</option>
							<?php foreach ($staff as $r) { ?>
								<option value="<?= $r['id_staff'] ?>"><?= $r['id_staff'] . ' | ' . $r['nama']; ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="divider border-gray-400"></div>
					<div class="modal-action relative" style="z-index: 1000;">
						<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
						<button type="submit" class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
					</div>
				</form>
			</div>
		</dialog>
	<?php endif; ?>

	<?php if (!empty($direktur)): ?>
		<!-- modal edit direktur -->
		<dialog id="changeDirektur" class="modal overflow-hidden">
			<div class="modal-box bg-[#fafafa]">
				<!-- Tombol close di sudut kanan atas -->
				<form method="dialog">
					<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
				</form>
				<h3 class="text-xs sm:text-sm md:text-base font-bold text-blue-600 flex flex-row items-center">
					Ganti Direktur Admisi
					<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
						<i data-feather="image" class="w-4 h-4"></i>
					</div>
				</h3>
				<div class="divider border-gray-400"></div>
				<form method="post" action="<?= site_url(ucwords($role) . '/Dir_Admisi/update/' . $direktur['id']); ?>" enctype="multipart/form-data" role="form">
					<?= csrf(); ?>
					<div class="mb-4">
						<label for="direktur" class="block text-sm font-medium text-gray-700 mb-2">Direktur Mahasiswa:</label>
						<select id="direktur" name="id_direktur" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
							<option value="" selected disabled>--Pilih Direktur--</option>
							<?php foreach ($staff as $r) { ?>
								<option value="<?= $r['id_staff'] ?>" <?= ($r['id_staff'] == $direktur['id_staff']) ? 'selected' : '' ?>>
									<?= $r['id_staff'] . ' | ' . $r['nama']; ?>
								</option>
							<?php } ?>
						</select>
					</div>

					<div class="divider border-gray-400"></div>
					<div class="modal-action relative" style="z-index: 1000;">
						<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
						<button type="submit" class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
					</div>
				</form>
			</div>
		</dialog>
	<?php endif; ?>

	<?php if (!empty($direktur)): ?>
		<!-- modal edit Signature -->
		<dialog id="editSignature" class="modal overflow-hidden">
			<div class="modal-box bg-[#fafafa]">
				<!-- Tombol close di sudut kanan atas -->
				<form method="dialog">
					<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
				</form>
				<h3 class="text-xs sm:text-sm md:text-base font-bold text-blue-600 flex flex-row items-center">
					Ubah Tanda Tangan
					<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
						<i data-feather="image" class="w-4 h-4"></i>
					</div>
				</h3>
				<div class="divider border-gray-400"></div>
				<form method="post" action="<?= site_url(ucwords($role) . '/Dir_Admisi/change_signature/') . $direktur['id']; ?>" enctype="multipart/form-data" role="form">
					<?= csrf(); ?>
					<div class="mb-4">
						<label for="file" class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Upload Tanda Tangan:</label>
						<div class="relative file-upload-container">
							<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-2 border-blue-400 border-dashed rounded-lg  w-full shadow-lg transtition">
								<div class="text-center flex flex-col gap-1 md:gap-2">
									<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
										<path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
									</svg>
									<p class="text-gray-600 text-xs sm:text-sm font-semibold">
										<i class="fas fa-cloud-upload-alt"></i><span class="text-blue-600 font-bold">Upload File</span> atau Drag & Drop
									</p>
									<p class="text-xs text-gray-500 mb-2">PNG Only up to 5 MB</p>
								</div>

								<input id="file" name="signature" accept="image/png" type="file" class="file-input hidden" />

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
	<?php endif; ?>

	<?php if (!empty($direktur)): ?>
		<!-- modal edit Stamp -->
		<dialog id="editStamp" class="modal overflow-hidden">
			<div class="modal-box bg-[#fafafa]">
				<!-- Tombol close di sudut kanan atas -->
				<form method="dialog">
					<button class="btn btn-sm btn-circle btn-ghost text-red-600 absolute right-2 top-2">✕</button>
				</form>
				<h3 class="text-xs sm:text-sm md:text-base font-bold text-blue-600 flex flex-row items-center">
					Ubah Stamp
					<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg ml-2 md:ml-4">
						<i data-feather="image" class="w-4 h-4"></i>
					</div>
				</h3>
				<div class="divider border-gray-400"></div>
				<form method="post" action="<?= site_url(ucwords($role) . '/Dir_Admisi/change_stamp/') . $direktur['id']; ?>" enctype="multipart/form-data" role="form">
					<?= csrf(); ?>
					<div class="mb-4">
						<label for="file" class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Upload Stamp:</label>
						<div class="relative file-upload-container">
							<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-blue-400 border-2 border-dashed rounded-lg  w-full shadow-lg transtition">
								<div class="text-center flex flex-col gap-1 md:gap-2">
									<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
										<path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
									</svg>
									<p class="text-gray-600 text-xs sm:text-sm font-semibold">
										<i class="fas fa-cloud-upload-alt"></i><span class="text-blue-600 font-bold">Upload File</span> atau Drag & Drop
									</p>
									<p class="text-xs text-gray-500 mb-2">PNG Only up to 5 MB</p>
								</div>

								<input id="file" name="stamp" accept="image/png" type="file" class="file-input hidden" />

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
	<?php endif; ?>
</section>
