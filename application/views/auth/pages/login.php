<section class="flex justify-between gap-4 lg:gap-8 xl:gap-12 items-center justify-center">
	<!-- image -->
	<section class="hidden md:block rounded-xl md:w-2/5 h-screen px-4 py-8 relative">
		<img src="https://demos.creative-tim.com/material-tailwind-dashboard-react/img/pattern.png" alt="universitas alma ata" class="object-cover rounded-xl w-full h-full">
	</section>
	<!-- form -->
	<section class="md:w-3/5 w-full rounded-xl">
		<div class="flex flex-col p-4 md:p-4 lg:p-6 ">
			<img src="<?= base_url("assets/static/img/logo-uaa.png"); ?>" alt="UAA" class="w-32 h-auto mx-auto">
			<h1 class="text-4xl  md:text-5xl lg:text-6xl xl:text-7xl text-gray-900 font-bold p-4 text-center montserrat">Selamat Datang</h1>
			<p class="text-center font-base text-gray-400 kanit">Masukkan email dan password!</p>
			<form action="<?= site_url(); ?>Auth/login" method="post">
				<div class="flex flex-col p-4 gap-4">
					<!-- Email -->
					<div class="w-full">
						<label for="email" class="text-gray-900 font-semibold mb-2">Email:</label>
						<label class="input input-bordered border border-gray-400 flex items-center gap-2 w-full">
							<svg
								xmlns="http://www.w3.org/2000/svg"
								viewBox="0 0 16 16"
								fill="currentColor"
								class="h-4 w-4 opacity-70">
								<path
									d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
								<path
									d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
							</svg>
							<input id="email" type="text" name="email" class="grow" placeholder="Email" />
						</label>
					</div>
					<!-- Password -->
					<div>
						<label for="password" class="text-gray-900 font-semibold mb-2">Kata Sandi:</label>
						<label class="input input-bordered border border-gray-400 flex items-center gap-2 w-full">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
								<path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" />
							</svg>
							<input type="password" id="password" name="password" class="grow bg-[#fafafa] border-gray-400" placeholder="******" />
							<button type="button" id="togglePassword" class="text-gray-600 hover:text-gray-800 focus:outline-none" onclick="showPassword()">
								<i id="iconShow" data-feather="eye" class="h-4 w-4"></i>
								<i id="iconHide" data-feather="eye-off" class="h-4 w-4 hidden"></i>
							</button>
						</label>
					</div>

					<button type="submit" class="btn btn-block mt-4 text-base text-[#fafafa] font-bold uppercase" aria-label="Submit">Masuk </button>
				</div>
			</form>
		</div>
	</section>

</section>