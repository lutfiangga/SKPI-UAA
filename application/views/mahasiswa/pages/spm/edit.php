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

	<!-- form data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<form method="post" action="<?= site_url(ucwords($role) . '/Spm_Mahasiswa/update/') . $edit['id_spm'] ?>"
			enctype="multipart/form-data" role="form">
			<?= csrf(); ?>
			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				<!-- Nama Kategori -->
				<div class="flex flex-col">
					<label for="kategori" class="mb-2 text-sm font-medium text-gray-700">Kategori:</label>
					<select id="kategori" required name="id_kategori_spm"
						class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Kategori--</option>
						<?php foreach ($kategori->result_array() as $r) { ?>
							<option value="<?= $r['id_kategori_spm'] ?>"
								<?= ($r['id_kategori_spm'] == $r['id_kategori_spm']) ? 'selected' : '' ?>>
								<?= $r['id_kategori_spm'] . ' | ' . $r['kategori']; ?></option>
						<?php } ?>
					</select>
				</div>

				<!-- Nama Kegiatan -->
				<div class="flex flex-col">
					<label for="kegiatan" class="mb-2 text-sm font-medium text-gray-700">Nama Kegiatan:</label>
					<input type="text" required id="kegiatan" name="kegiatan"
						class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						value="<?= $edit['kegiatan']; ?>">
				</div>

				<!-- Penyelenggara -->
				<div class="flex flex-col">
					<label for="penyelenggara" class="mb-2 text-sm font-medium text-gray-700">Penyelenggara:</label>
					<input type="text" required id="penyelenggara" name="penyelenggara"
						class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						value="<?= $edit['penyelenggara']; ?>">
				</div>

				<!-- Tanggal -->
				<div class="flex flex-col relative">
					<label for="tanggal_mulai" class="mb-2 text-sm font-medium text-gray-700">Tanggal Mulai</label>
					<input type="text" id="tanggal_mulai" required name="tanggal_mulai"
						class="pickdate p-2 w-full rounded-md bg-[#fafafa] focus:ring-inset focus:ring-blue-400 border border-gray-300"
						placeholder="Tanggal Mulai" value="<?= $edit['tanggal_mulai']; ?>">
				</div>

				<div class="flex flex-col relative">
					<label for="tanggal_selesai" class="mb-2 text-sm font-medium text-gray-700">Tanggal Selesai:</label>
					<input type="text" id="tanggal_selesai" name="tanggal_selesai"
						class="pickdate p-2 w-full rounded-md bg-[#fafafa] focus:ring-inset focus:ring-blue-400 border border-gray-300"
						placeholder="tanggal Selesai" value="<?= $edit['tanggal_selesai']; ?>">
				</div>

				<!-- Link Kegiatan -->
				<div class="flex flex-col">
					<label for="url" class="mb-2 text-sm font-medium text-gray-700">Link Kegiatan:</label>
					<input type="url" required id="url" name="link_kegiatan"
						class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						value="<?= $edit['link_kegiatan']; ?>" placeholder="https://example.com"
						oninput=" inputValidation(this)">
					<p id="urlError" class="text-red-500 text-xs sm:text-sm md:text-base mt-2 hidden">Url harus valid!
						contoh: https://example.com</p>
				</div>
				<div class="flex flex-col md:col-span-2">
					<label for="tempat_kegiatan" class="mb-2 text-sm font-medium text-gray-700">Tempat Kegiatan:</label>
					<input type="tempat_kegiatan" required id="tempat_kegiatan" name="tempat_kegiatan" value="<?= $edit['tempat_kegiatan']; ?>"
						class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						placeholder="Kantor Kemdikbud">
				</div>

				<!-- Sertifikat [File] -->
				<div class="flex flex-col">
					<label for="sertifikat" class="mb-2 text-sm font-medium text-gray-700">Sertifikat:</label>
					<div class="relative file-upload-container">
						<div
							class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-blue-400 border-2 border-dashed rounded-lg w-full shadow-lg transtition">
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
								<p class="text-xs text-gray-500 mb-2">PDF Only up to 5 MB</p>
							</div>

							<input id="sertifikat" required value="<?= $edit['sertifikat']; ?>" name="sertifikat"
								accept="application/pdf" type="file" class="file-input hidden" />

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
									<?= isset($edit['sertifikat']) ? $edit['sertifikat'] : ''; ?></div>
								<button type="button"
									class="clear-btn btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:border-2 hover:border-blue-600 hover:shadow-md hidden text-xs sm:text-sm md:text-base">
									<span class="flex flex-row gap-2 items-center">
										<i data-feather="trash-2" class="w-4 h-auto"></i> Hapus
									</span>
								</button>
							</div>
							<div class="preview-container w-full flex justify-center mx-auto">
								<?php
								$file_path = FCPATH . 'assets/static/spm/pdf/sertifikat/' . $edit['sertifikat'];
								if (isset($edit['sertifikat']) && !empty($edit['sertifikat']) && file_exists($file_path)): ?>
									<iframe
										src="<?= base_url('assets/static/spm/pdf/sertifikat/' . $edit['sertifikat']); ?>"
										width="100%" height="400px"></iframe>
								<?php else: ?>
									<p>File tidak ditemukan.</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="modal hidden">
							<span
								class="close-modal text-white text-3xl cursor-pointer absolute top-4 right-4">&times;</span>
							<img class="modal-content max-w-80% max-h-80%" />
						</div>
					</div>
				</div>

				<!-- Surat Tugas [File] -->
				<div class="flex flex-col">
					<label for="surat_tugas" class="mb-2 text-sm font-medium text-gray-700">Surat Tugas:</label>
					<div class="relative file-upload-container">
						<div
							class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-blue-400 border-2 border-dashed rounded-lg w-full shadow-lg transtition">
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
								<p class="text-xs text-gray-500 mb-2">PDF Only up to 5 MB</p>
							</div>

							<input id="surat_tugas" value="<?= $edit['surat_tugas']; ?>" name="surat_tugas"
								accept="application/pdf" type="file" class="file-input hidden" />

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
									<?= isset($edit['surat_tugas']) ? $edit['surat_tugas'] : ''; ?></div>
								<button type="button"
									class="clear-btn btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:border-2 hover:border-blue-600 hover:shadow-md hidden text-xs sm:text-sm md:text-base">
									<span class="flex flex-row gap-2 items-center">
										<i data-feather="trash-2" class="w-4 h-auto"></i> Hapus
									</span>
								</button>
							</div>
							<div class="preview-container w-full flex justify-center mx-auto">
								<div class="preview-container w-full flex justify-center mx-auto">
									<?php
									$file_path = FCPATH . 'assets/static/spm/pdf/surat_tugas/' . $edit['surat_tugas'];
									if (isset($edit['surat_tugas']) && !empty($edit['surat_tugas']) && file_exists($file_path)): ?>
										<iframe
											src="<?= base_url('assets/static/spm/pdf/surat_tugas/' . $edit['surat_tugas']); ?>"
											width="100%" height="400px"></iframe>
									<?php else: ?>
										<p>File tidak ditemukan.</p>
									<?php endif; ?>
								</div>
							</div>
						</div>

						<div class="modal hidden">
							<span
								class="close-modal text-white text-3xl cursor-pointer absolute top-4 right-4">&times;</span>
							<img class="modal-content max-w-80% max-h-80%" />
						</div>
					</div>
				</div>

				<!-- Foto Kegiatan [File] -->
				<div class="flex flex-col md:col-span-2">
					<label for="foto_kegiatan" class="mb-2 text-sm font-medium text-gray-700">Foto Kegiatan:</label>
					<div class="relative file-upload-container">
						<div
							class="bg-white drop-zone relative cursor-pointer transition-all text-center p-8 border-blue-400 border-2 border-dashed rounded-lg w-full shadow-lg transtition">
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
								<p class="text-xs text-gray-500 mb-2">PDF Only up to 5 MB</p>
							</div>

							<input id="foto_kegiatan" value="<?= $edit['foto_kegiatan']; ?>" name="foto_kegiatan"
								accept="application/pdf" type="file" class="file-input hidden" />

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
									<?= isset($edit['foto_kegiatan']) ? $edit['foto_kegiatan'] : ''; ?></div>
								<button type="button"
									class="clear-btn btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:border-2 hover:border-blue-600 hover:shadow-md hidden text-xs sm:text-sm md:text-base">
									<span class="flex flex-row gap-2 items-center">
										<i data-feather="trash-2" class="w-4 h-auto"></i> Hapus
									</span>
								</button>
							</div>
							<div class="preview-container w-full flex justify-center mx-auto">
								<?php
								$file_path = FCPATH . 'assets/static/spm/pdf/foto_kegiatan/' . $edit['foto_kegiatan'];
								if (isset($edit['foto_kegiatan']) && !empty($edit['foto_kegiatan']) && file_exists($file_path)): ?>
									<iframe
										src="<?= base_url('assets/static/spm/pdf/foto_kegiatan/' . $edit['foto_kegiatan']); ?>"
										width="100%" height="400px"></iframe>
								<?php else: ?>
									<p>File tidak ditemukan.</p>
								<?php endif; ?>
							</div>
						</div>

						<div class="modal hidden">
							<span
								class="close-modal text-white text-3xl cursor-pointer absolute top-4 right-4">&times;</span>
							<img class="modal-content max-w-80% max-h-80%" />
						</div>
					</div>
				</div>

			</div>

			<div class="divider border-gray-400"></div>
			<div class="modal-action relative" style="z-index: 1000;">
				<a href="<?= site_url(ucwords($role) . '/Spm_Mahasiswa'); ?>"
					class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Close</a>
				<button type="submit"
					class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
			</div>
		</form>
	</section>

</section>
