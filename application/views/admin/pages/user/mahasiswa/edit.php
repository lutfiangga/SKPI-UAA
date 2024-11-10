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
		<form method="post" action="<?= site_url(ucwords($role) . '/User/Mahasiswa/update/' . $edit['nim']) ?>"
			enctype="multipart/form-data" role="form">
			<?= csrf(); ?>
			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				<!-- NIM -->
				<div class="flex flex-col">
					<label for="nim" class="mb-2 text-sm font-medium text-gray-700">NIM:</label>
					<input type="number" disabled inputmode="numeric" id="nim" name="nim" value="<?= $edit['nim']; ?>"
						class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-not-allowed"
						placeholder="Masukkan NIM">
				</div>

				<!-- Nama Prodi -->
				<div class="flex flex-col">
					<label for="prodi" class="mb-2 text-sm font-medium text-gray-700">Program Studi:</label>
					<select id="prodi" name="id_prodi"
						class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Prodi--</option>
						<?php foreach ($prodi as $r) { ?>
							<option value="<?= $r['id_prodi'] ?>" <?= ($r['id_prodi'] == $edit['id_prodi']) ? 'selected' : '' ?>><?= $r['id_prodi'] . ' | ' . $r['prodi']; ?></option>
						<?php } ?>
					</select>
				</div>

				<!-- Nama -->
				<div class="flex flex-col">
					<label for="name" class="mb-2 text-sm font-medium text-gray-700">Nama:</label>
					<input type="text" id="name" name="nama" oninput="inputValidation(this)" value="<?= $edit['nama']; ?>"
						class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						placeholder="Masukkan nama">
					<p id="nameError" class="text-red-500 mt-2 text-xs lg:text-sm hidden">Nama harus minimal 3 karakter dan hanya mengandung huruf.</p>
				</div>
				<!-- jenis kelamin -->
				<div class="flex flex-col">
					<label for="jenis_kelamin" class="mb-2 text-sm font-medium text-gray-700">jenis Kelamin</label>
					<select id="jenis_kelamin" name="jenis_kelamin"
						class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Jenis Kelamin--</option>
						<option value="Laki-laki" <?= ($edit['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
						<option value="Perempuan" <?= ($edit['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
					</select>
				</div>
				<!-- Tanggal lahir-->
				<div class="flex flex-col relative">
					<label for="tanggal_lahir" class="mb-2 text-sm font-medium text-gray-700">Tanggal Lahir:</label>
					<input id="tanggal_lahir" type="text" name="tgl_lahir" value="<?= $edit['tgl_lahir']; ?>"
						class="pickdate p-2 w-full rounded-md bg-[#fafafa] focus:ring-inset focus:ring-blue-400 border border-gray-300"
						placeholder="Tanggal lahir">
				</div>
				<div class="mb-4">
					<label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email:</label>
					<input type="email" id="email" name="email" oninput="inputValidation(this)" value="<?= $edit['email']; ?>"
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan email" />
					<p id="emailError" class="text-red-500 text-sm mt-2 hidden">Format email tidak valid.</p>
				</div>
				<!-- phone -->
				<div class="flex flex-col">
					<label for="phone" class="mb-2 text-sm font-medium text-gray-700">Telepon:</label>
					<input type="number" inputmode="numeric" id="phone" name="phone" value="<?= $edit['phone']; ?>"
						class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						placeholder="Masukkan telepon">
					<p id="phoneError" class="text-red-500 text-sm mt-2 hidden">Format telepon tidak valid.</p>
				</div>


				<!-- tahun Masuk -->
				<div class="flex flex-col">
					<label for="tahun_masuk" class="mb-2 text-sm font-medium text-gray-700">Tahun Masuk:</label>
					<input type="number" inputmode="numeric" id="tahun_masuk" name="tahun_masuk" value="<?= $edit['tahun_masuk']; ?>"
						class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						placeholder="Masukkan tahun masuk">
				</div>
				<!-- tahun Masuk -->
				<div class="flex flex-col">
					<label for="tahun_lulus" class="mb-2 text-sm font-medium text-gray-700">Tahun Lulus:</label>
					<input type="number" inputmode="numeric" id="tahun_lulus" name="tahun_lulus" value="<?= $edit['tahun_lulus']; ?>"
						class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						placeholder="Masukkan tahun lulus">
				</div>

				<!-- status mahasiswa -->
				<div class="flex flex-col">
					<label for="status_mahasiswa" class="mb-2 text-sm font-medium text-gray-700">Status Mahasiswa:</label>
					<select id="status_mahasiswa" name="status_mahasiswa"
						class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Status Mahasiswa--</option>
						<option value="Mahasiswa Baru" <?= ($edit['status_mahasiswa'] == 'Mahasiswa Baru') ? 'selected' : '' ?>>Mahasiswa Baru</option>
						<option value="Mahasiswa Transfer" <?= ($edit['status_mahasiswa'] == 'Mahasiswa Transfer') ? 'selected' : '' ?>>Mahasiswa Transfer</option>
					</select>
				</div>
				<!-- semester diakui -->
				<div class="flex flex-col">
					<label for="semester_diakui" class="mb-2 text-sm font-medium text-gray-700">Semester Diakui:</label>
					<input type="number" inputmode="numeric" id="semester_diakui" name="semester_diakui" value="<?= $edit['semester_diakui']; ?>"
						class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						placeholder="Masukkan semester yang sudah ditempuh">
				</div>
				<!-- Periode Ajaran -->
				<div class="flex flex-col">
					<label for="periode" class="mb-2 text-sm font-medium text-gray-700">Periode Ajaran:</label>
					<select id="periode" name="periode"
						class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Periode Ajaran --</option>
						<option value="Ganjil" <?= ($edit['periode'] == 'Ganjil') ? 'selected' : '' ?>>Ganjil</option>
						<option value="Genap" <?= ($edit['periode'] == 'Genap') ? 'selected' : '' ?>>Genap</option>
					</select>
				</div>
			</div>

			<div class="divider border-gray-400"></div>
			<div class="modal-action relative" style="z-index: 1000;">
				<a href="<?= site_url(ucwords($role) . '/User/Mahasiswa'); ?>"
					class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Close</a>
				<button type="submit"
					class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
			</div>
		</form>
	</section>

</section>
