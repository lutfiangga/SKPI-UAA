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
				<i data-feather="trello" class="w-4 h-4 sm:h-[20px] sm:w-[20px] md:h-[24px] md:w-[24px]"></i>
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
			<button id="tab-biodata" class="px-4 py-2 text-blue-600 border-b-2 border-blue-600 focus:outline-none">
				Biodata
			</button>
			<button id="tab-password" class="px-4 py-2 text-gray-600 border-b-2 focus:outline-none">
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
				<div id="content-biodata" class="space-y-2">
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
				<div id="content-password" class="hidden space-y-4 ">
					<form class="flex flex-col gap-2">
						<div>
							<label for="current-password" class="block text-sm font-medium text-gray-700">Current Password</label>
							<input type="password" id="current-password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
						</div>
						<div>
							<label for="new-password" class="block text-sm font-medium text-gray-700">New Password</label>
							<input type="password" id="new-password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
						</div>
						<div>
							<label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
							<input type="password" id="confirm-password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
						</div>
						<button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg">Update Password</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		const tabBiodata = document.getElementById('tab-biodata');
		const tabPassword = document.getElementById('tab-password');
		const contentBiodata = document.getElementById('content-biodata');
		const contentPassword = document.getElementById('content-password');

		tabBiodata.addEventListener('click', () => {
			contentBiodata.classList.remove('hidden');
			contentPassword.classList.add('hidden');
			tabBiodata.classList.add('border-blue-600', 'text-blue-600');
			tabPassword.classList.remove('border-blue-600', 'text-blue-600');
			tabPassword.classList.add('text-gray-600');
		});

		tabPassword.addEventListener('click', () => {
			contentBiodata.classList.add('hidden');
			contentPassword.classList.remove('hidden');
			tabPassword.classList.add('border-blue-600', 'text-blue-600');
			tabBiodata.classList.remove('border-blue-600', 'text-blue-600');
			tabBiodata.classList.add('text-gray-600');
		});
	</script>



</section>
