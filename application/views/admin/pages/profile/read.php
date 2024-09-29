<section class="relative flex flex-col justify-between">
	<div class="flex flex-row justify-between items-center">
		<div class="flex flex-row justify-start items-center md:gap-4 gap-2">
			<h1 class="md:text-2xl sm:text-xl lg:text-3xl text-md font-bold text-blue-600 whitespace-nowrap capitalize"><span class="flex flex-row items-center gap-2">
					<p class="block">
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
			<button class="px-4 py-2 tab-biodata text-blue-600 border-b-2 border-blue-600 focus:outline-none">
				Biodata
			</button>
			<button class="px-4 py-2 tab-password text-gray-600 border-b-2 focus:outline-none">
				Update Password
			</button>
		</div>

		<!-- Tab Content -->
		<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
			<!-- Profile Picture -->
			<div class="col-span-1 flex justify-center items-center">
				<div class="avatar flex justify-center items-center">
					<div class="mask mask-squircle w-3/4">
						<img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
					</div>
				</div>
			</div>

			<!-- Content -->
			<div class="col-span-2">
				<!-- Biodata Tab Content -->
				<div class="space-y-2 content-biodata">
					<!-- update biodata-button -->
					<div class="ml-auto flex justify-end">
						<a href="<?= site_url(ucwords($role) . '/Myprofile/edit'); ?>" class="btn bg-blue-600 border-none text-[#fafafa] hover:bg-[#fafafa]/30 hover:text-blue-600 hover:border-2 hover:border-blue-600 hover:shadow-md w-full md:w-auto flex flex-row items-center">
							<div class="bg-[#faafa] md:p-3 p-2 rounded-lg">
								<i data-feather="edit" class="w-4 h-4"></i>
							</div>
							Edit Biodata
						</a>
					</div>

					<div>
						<label class="font-semibold text-gray-700">Nama:</label>
						<p><?= $nama; ?></p>
					</div>
					<div>
						<label class="font-semibold text-gray-700">Email:</label>
						<p><?= $email; ?></p>
					</div>
					<div>
						<label class="font-semibold text-gray-700">Alamat:</label>
						<p><?= $alamat; ?></p>
					</div>
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
					<form class="flex flex-col gap-2" action="<?= site_url(ucwords($role) . '/Myprofile/update_password'); ?>" method="POST" enctype="multipart/form-data">
						<div>
							<label for="current-password" class="block text-sm font-medium text-gray-700">Current Password</label>
							<div class="flex flex-row w-full mt-1">
								<input type="password" id="current-password" name="current_password" required oninput="inputValidation(this)"
									class="block w-full border border-gray-300 rounded-l-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2 pr-10 password"
									placeholder="Masukkan password" />
								<button type="button" class="flex items-center p-2 bg-blue-600 rounded-r-md text-white hover:bg-blue-500 focus:outline-none togglePassword" onclick="showPassword()">
									<i data-feather="eye" class="h-4 w-4 iconShow"></i>
									<i data-feather="eye-off" class="h-4 w-4 hidden iconHide"></i>
								</button>
							</div>
						</div>
						<div>
							<label for="new-password" class="block text-sm font-medium text-gray-700">New Password</label>
							<div class="flex flex-row w-full mt-1">
								<input type="password" id="new-password" name="new_password" required oninput="inputValidation(this)"
									class="block w-full border border-gray-300 rounded-l-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2 pr-10 password"
									placeholder="Masukkan password" />
								<button type="button" class="flex items-center p-2 bg-blue-600 rounded-r-md text-white hover:bg-blue-500 focus:outline-none togglePassword" onclick="showPassword()">
									<i data-feather="eye" class="h-4 w-4 iconShow"></i>
									<i data-feather="eye-off" class="h-4 w-4 hidden iconHide"></i>
								</button>
							</div>
							<p id="new-passwordError" class="text-red-500 text-sm mt-2 hidden">Password harus memiliki minimal 6 karakter, mengandung huruf besar, huruf kecil, dan angka.</p>
						</div>
						<div>
							<label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
							<div class="flex flex-row w-full mt-1">
								<input type="password" id="confirm-password" name="confirm_password" required oninput="inputValidation(this)"
									class="block password w-full border border-gray-300 rounded-l-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2 pr-10 password"
									placeholder="Masukkan password" />
								<button type="button" class="flex items-center p-2 bg-blue-600 rounded-r-md text-white hover:bg-blue-500 focus:outline-none togglePassword" onclick="showPassword()">
									<i data-feather="eye" class="h-4 w-4 iconShow"></i>
									<i data-feather="eye-off" class="h-4 w-4 hidden iconHide"></i>
								</button>
							</div>
							<p id="confirm-passwordError" class="text-red-500 text-sm mt-2 hidden">Confirm password tidak sama!</p>
						</div>
						<button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg disabled:bg-gray-300">Update Password</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</section>
