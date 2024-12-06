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
						<i data-feather="users" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							Users
						</span>
					</a>
				</li>
				<li>
					<a class="gap-2 flex items-center">
						<i data-feather="user" class="w-4 h-auto"></i>
						<span class="hidden md:block">
							Staff
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="divider border-gray-600"></div>
	<!-- Alert duplicate ID -->
	<?php if ($this->session->flashdata('create_error')): ?>
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
			<span> <?= $this->session->flashdata('create_error'); ?></span>
		</div>
	<?php endif; ?>

	<!-- Alert success -->
	<!-- form data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<form method="post" action="<?= site_url(ucwords($role) . '/User/Staff/save/') ?>"
			enctype="multipart/form-data" role="form">
			<?= csrf(); ?>
			<div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6">
				<!-- NIP/NIDN -->
				<div class="flex flex-col">
					<label for="id_staff" class="mb-2 text-sm font-medium text-gray-700">NIP/NIDN:</label>
					<input type="number" inputmode="numeric" required id="id_staff" name="id_staff"
						class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						placeholder="Masukkan NIP/NIDN">
				</div>
				<!-- Nama -->
				<div class="flex flex-col">
					<label for="name" class="mb-2 text-sm font-medium text-gray-700">Nama:</label>
					<input type="text" required id="name" name="nama" oninput="inputValidation(this)"
						class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						placeholder="Masukkan nama">
					<p id="nameError" class="text-red-500 mt-2 text-xs lg:text-sm hidden">Nama harus minimal 3 karakter dan hanya mengandung huruf.</p>
				</div>
				<!-- jenis kelamin -->
				<div class="flex flex-col">
					<label for="jenis_kelamin" class="mb-2 text-sm font-medium text-gray-700">jenis Kelamin</label>
					<select id="jenis_kelamin" required name="jenis_kelamin"
						class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Jenis Kelamin--</option>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
				<!-- Tanggal lahir-->
				<div class="flex flex-col relative">
					<label for="tanggal_lahir" class="mb-2 text-sm font-medium text-gray-700">Tanggal Lahir:</label>
					<input id="tanggal_lahir" type="date" name="tgl_lahir"
						class="pickdate p-2 w-full rounded-md bg-[#fafafa] focus:ring-inset focus:ring-blue-400 border border-gray-300"
						placeholder="Tanggal lahir">
				</div>
				<!-- email -->
				<div class="flex flex-col">
					<label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email:</label>
					<input type="email" id="email" name="email" oninput="inputValidation(this)"
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan email" />
					<p id="emailError" class="text-red-500 text-sm mt-2 hidden">Format email tidak valid.</p>
				</div>
				<!-- phone -->
				<div class="flex flex-col">
					<label for="phone" class="mb-2 text-sm font-medium text-gray-700">Telepon:</label>
					<input type="number" inputmode="numeric" id="phone" name="phone"
						class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						placeholder="Masukkan telepon">
					<p id="phoneError" class="text-red-500 text-sm mt-2 hidden">Format telepon tidak valid.</p>
				</div>

				<!-- jabatan -->
				<div class="flex flex-col md:col-span-2">
					<label for="jabatan" class="mb-2 text-sm font-medium text-gray-700 z">Jabatan:</label>
					<textarea type="text" id="jabatan" name="jabatan" rows="2"
						class="p-2 border border-gray-300 text-black bg-[#fafafa] rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
						placeholder="Masukkan jabatan"></textarea>
				</div>

			</div>

			<div class="divider border-gray-400"></div>
			<div class="modal-action relative" style="z-index: 1000;">
				<a href="<?= site_url(ucwords($role) . '/User/Staff'); ?>"
					class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Close</a>
				<button type="submit"
					class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
			</div>
		</form>
	</section>

</section>
