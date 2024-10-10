<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-2xl sm:text-xl lg:text-3xl text-md font-bold text-blue-600 whitespace-nowrap capitalize"><span class="flex flex-row items-center gap-2">
					<p class="block truncate whitespace-wrap">
						<?= $sub; ?>
					</p>
					<p class="hidden md:block">
						<?= $role; ?>
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
			<button class="px-4 py-2 text-xs sm:text-sm md:text-base md:text-base gap-2 tab-biodata text-blue-600 border-b-2 flex flex-row items-center border-blue-600 focus:outline-none">
				<i data-feather="info" class="w-4 h-auto"></i> Biodata
			</button>
		</div>

		<!-- Tab Content -->
		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
			<!-- Profile Picture -->
			<div class="relative">
				<div class="avatar flex justify-center items-center">
					<div class="mask mask-squircle w-3/4">
						<img src="<?= base_url('assets/static/img/photos/kemahasiswaan/' . $direktur->foto) ?>" alt="Profile Picture" />
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
				<!-- Biodata Tab Content -->
				<div class="space-y-2 grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 content-biodata">
					<div class="text-xs sm:text-sm md:text-base">
						<label class="font-semibold text-gray-700">Nama:</label>
						<p class="capitalize"><?= $direktur->nama; ?></p>
					</div>
					<div class="text-xs sm:text-sm md:text-base">
						<label class="font-semibold text-gray-700">Telepon:</label>
						<p><?= $direktur->no_hp; ?></p>
					</div>
					<div class="text-xs sm:text-sm md:text-base">
						<label class="font-semibold text-gray-700">Email:</label>
						<p><?= $direktur->email; ?></p>
					</div>
					<div class="text-xs sm:text-sm md:text-base">
						<label class="font-semibold text-gray-700">Jenis Kelamin:</label>
						<p><?= $direktur->jenis_kelamin; ?></p>
					</div>
					<div class="text-xs sm:text-sm md:text-base">
						<label class="font-semibold text-gray-700">Jabatan:</label>
						<p>Direktur Kemahasiswaan</p>
					</div>
					<div class="text-xs sm:text-sm md:text-base">
						<label class="font-semibold text-gray-700">Alamat:</label>
						<p><?= $direktur->alamat; ?></p>
					</div>
					<div class="mb-4">
						<label class="block text-gray-700 flex flex-row gap-2 items-center font-medium">Tanda Tangan:
							<button onclick="editSignature.showModal()" class="text-blue-600 w-auto flex flex-row items-center">
								<div class="bg-[#faafa] rounded-lg">
									<i data-feather="edit" class="w-4 h-4"></i>
								</div>
							</button>
						</label>
						<div class="relative max-w-24 md:max-w-36">
							<div class="avatar flex justify-center items-center">
								<div class="w-3/4">
									<img src="<?= base_url('assets/static/img/photos/kemahasiswaan/signature/' . $direktur->signature) ?>" alt="signature" />
								</div>
							</div>
						</div>
					</div>

					<div class="mb-4">
						<label class="block text-gray-700 flex flex-row gap-2 items-center font-medium">Cap:
							<button onclick="editStamp.showModal()" class="text-blue-600 w-auto flex flex-row items-center">
								<div class="bg-[#faafa] rounded-lg">
									<i data-feather="edit" class="w-4 h-4"></i>
								</div>
							</button>
						</label>
						<div class="relative max-w-24 md:max-w-36">
							<div class="avatar flex justify-center items-center">
								<div class="w-3/4">
									<img src="<?= base_url('assets/static/img/photos/kemahasiswaan/stamp/' . $direktur->stamp) ?>" alt="stamp" />
								</div>
							</div>
						</div>
					</div>

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
			<form method="post" action="<?= site_url('Kemahasiswaan/Dir_Kemahasiswaan/change_image/') . $direktur->id_direktur; ?>" enctype="multipart/form-data" role="form">
				<?= csrf(); ?>
				<div class="mb-4">
					<label for="file" class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Upload Foto:</label>
					<div class="relative file-upload-container">
						<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-2 border-blue-400 border-2 border-dashed rounded-lg max-w-md w-full shadow-lg transtition">
							<div class="text-center flex flex-col gap-1 md:gap-2">
								<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
								</svg>
								<p class="text-gray-600 text-xs sm:text-sm font-semibold">
									<i class="fas fa-cloud-upload-alt"></i><span class="text-blue-600 font-bold">Upload File</span> atau Drag & Drop
								</p>
								<p class="text-xs text-gray-500 mb-2">JPG, PNG up to 5 MB</p>
							</div>

							<input id="file" name="foto" accept="image/jpg, image/png, image/jpeg, image/wepb" type="file" class="file-input hidden" />

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
					<button type="submit" class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
					<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
				</div>
			</form>
		</div>
	</dialog>
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
			<form method="post" action="<?= site_url('Kemahasiswaan/Dir_Kemahasiswaan/change_signature/') . $direktur->id_direktur; ?>" enctype="multipart/form-data" role="form">
				<?= csrf(); ?>
				<div class="mb-4">
					<label for="file" class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Upload Tanda Tangan:</label>
					<div class="relative file-upload-container">
						<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-2 border-blue-400 border-2 border-dashed rounded-lg max-w-md w-full shadow-lg transtition">
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
					<button type="submit" class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
					<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
				</div>
			</form>
		</div>
	</dialog>
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
			<form method="post" action="<?= site_url('Kemahasiswaan/Dir_Kemahasiswaan/change_stamp/') . $direktur->id_direktur; ?>" enctype="multipart/form-data" role="form">
				<?= csrf(); ?>
				<div class="mb-4">
					<label for="file" class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Upload Stamp:</label>
					<div class="relative file-upload-container">
						<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-2 border-blue-400 border-2 border-dashed rounded-lg max-w-md w-full shadow-lg transtition">
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
					<button type="submit" class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
					<button type="button" class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4" onclick="this.closest('dialog').close();">Close</button>
				</div>
			</form>
		</div>
	</dialog>

</section>
