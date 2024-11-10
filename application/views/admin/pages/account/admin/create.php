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
	<!-- form data -->
	<section class="relative bg-[#fafafa] rounded-2xl lg:p-8 p-4 my-4">
		<form method="post" action="<?= site_url(ucwords($role) . '/Account/Admin/save/') ?>"
			enctype="multipart/form-data" role="form">
			<?= csrf(); ?>
			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				<div class="mb-4">
					<label for="select_staff" class="block text-sm font-medium text-gray-700 mb-2">Pegawai/Dosen:</label>
					<select id="select_staff" name="id_user" class="block bg-off-white w-full mt-1 p-2 border border-gray-300 rounded-md" data-search="true">
						<option value="" selected disabled>--Pilih Pegawai/Dosen--</option>
						<?php foreach ($staff as $r) { ?>
							<option value="<?= $r['id_staff'] ?>"><?= $r['id_staff'] . ' | ' . $r['nama']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="">
					<label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username:</label>
					<input type="text" id="username" name="username" required oninput="inputValidation(this)"
						class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2"
						placeholder="Masukkan username" />
					<p id="usernameError" class="text-red-500 mt-2 text-xs lg:text-sm hidden">Username harus minimal 3 karakter dan hanya mengandung huruf.</p>
				</div>
				<div class="col-span-2">
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
			</div>

			<div class="divider border-gray-400"></div>
			<div class="modal-action relative" style="z-index: 1000;">
				<a href="<?= site_url(ucwords($role) . '/Account/Admin'); ?>"
					class="btn bg-red-600 border-none text-[#fafafa] hover:bg-orange-400 hover:text-[#fafafa] hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Close</a>
				<button type="submit"
					class="btn disabled:text-gray-400 disabled:cursor-not-allowed bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md mb-4">Submit</button>
			</div>
		</form>
	</section>

</section>
