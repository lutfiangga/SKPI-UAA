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

	<!-- form data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<form action="<?= site_url('Mahasiswa/Spm_Mahasiswa/save'); ?>" class="mx-auto p-6 rounded-lg" enctype="multipart/form-data" role="form">
			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				<?= csrf(); ?>
				<!-- Nama Kegiatan -->
				<div class="flex flex-col">
					<label for="nama_kegiatan" class="mb-2 text-sm font-medium text-gray-700">Nama Kegiatan</label>
					<input type="text" id="nama_kegiatan" name="nama_kegiatan" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
				</div>

				<!-- Penyelenggara -->
				<div class="flex flex-col">
					<label for="penyelenggara" class="mb-2 text-sm font-medium text-gray-700">Penyelenggara</label>
					<input type="text" id="penyelenggara" name="penyelenggara" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
				</div>

				<!-- Tanggal -->
				<div class="flex flex-col relative">
					<label for="tanggal" class="mb-2 text-sm font-medium text-gray-700">Tanggal Mulai</label>
					<input type="text" name="start_date" class="pickdate p-2 w-full rounded-md bg-[#fafafa] focus:ring-inset focus:ring-blue-400 border border-gray-300" placeholder="Start Date">
				</div>

				<div class="flex flex-col relative">
					<label for="tanggal" class="mb-2 text-sm font-medium text-gray-700">Tanggal Selesai</label>
					<input type="text" name="end_date" class="pickdate p-2 w-full rounded-md bg-[#fafafa] focus:ring-inset focus:ring-blue-400 border border-gray-300" placeholder="End Date">
				</div>

				<!-- Link Kegiatan -->
				<div class="flex flex-col">
					<label for="link_kegiatan" class="mb-2 text-sm font-medium text-gray-700">Link Kegiatan</label>
					<input type="url" id="link_kegiatan" name="link_kegiatan" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
				</div>

				<!-- Foto Kegiatan [File] -->
				<div class="flex flex-col">
					<label for="foto_kegiatan" class="mb-2 text-sm font-medium text-gray-700">Foto Kegiatan</label>
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

							<input id="foto_kegiatan" name="foto_kegiatan" accept="image/jpg, image/png, image/jpeg, image/wepb" type="file" class="file-input hidden" />

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

				<!-- Sertifikat [File] -->
				<div class="flex flex-col">
					<label for="sertifikat" class="mb-2 text-sm font-medium text-gray-700">Sertifikat</label>
					<div class="relative file-upload-container">
						<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-2 border-blue-400 border-2 border-dashed rounded-lg max-w-md w-full shadow-lg transtition">
							<div class="text-center flex flex-col gap-1 md:gap-2">
								<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
								</svg>
								<p class="text-gray-600 text-xs sm:text-sm font-semibold">
									<i class="fas fa-cloud-upload-alt"></i><span class="text-blue-600 font-bold">Upload File</span> atau Drag & Drop
								</p>
								<p class="text-xs text-gray-500 mb-2">PDF Only up to 5 MB</p>
							</div>

							<input id="sertifikat" name="sertifikat" accept="application/pdf" type="file" class="file-input hidden" />

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

				<!-- Surat Tugas [File] -->
				<div class="flex flex-col">
					<label for="surat_tugas" class="mb-2 text-sm font-medium text-gray-700">Surat Tugas</label>
					<div class="relative file-upload-container">
						<div class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-2 border-blue-400 border-2 border-dashed rounded-lg max-w-md w-full shadow-lg transtition">
							<div class="text-center flex flex-col gap-1 md:gap-2">
								<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
								</svg>
								<p class="text-gray-600 text-xs sm:text-sm font-semibold">
									<i class="fas fa-cloud-upload-alt"></i><span class="text-blue-600 font-bold">Upload File</span> atau Drag & Drop
								</p>
								<p class="text-xs text-gray-500 mb-2">PDF Only up to 5 MB</p>
							</div>

							<input id="surat_tugas" name="surat_tugas" accept="application/pdf" type="file" class="file-input hidden" />

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
			</div>

			<!-- Submit Button -->
			<div class="mt-6">
				<button type="submit" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4 w-fit">
					Submit
				</button>
			</div>
		</form>
	</section>

</section>