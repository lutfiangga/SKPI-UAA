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
			<p class="text-center p-2 rounded-lg bg-[EEF0F6] font-sm text-gray-500 font-semibold kanit flex flex-row">Catatan! <marquee class="ml-2"><em class="font-normal">Jika ada kendala login silahkan hubungi FL (Frontliner) di Mal Layanan Mahasiswa</em> </marquee>
			</p>
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
			<?php if ($this->session->flashdata('auth_error')): ?>
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
					<span> <?= $this->session->flashdata('auth_error'); ?></span>
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
			<form action="<?= site_url(); ?>Auth/login" method="post" onsubmit="submitValidation(this)">
				<div class="flex flex-col p-4 gap-4">
					<?= csrf(); ?>
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
							<input id="email" required type="text" name="email" class="grow" placeholder="Email" oninput="inputValidation(this)" />
						</label>
						<p id="emailError" class="text-red-500 text-sm mt-2 hidden">Masukkan email yang valid!</p>
					</div>
					<!-- Password -->
					<div>
						<label for="password" class="text-gray-900 font-semibold mb-2">Kata Sandi:</label>
						<label class="input input-bordered border border-gray-400 flex items-center gap-2 w-full">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
								<path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" />
							</svg>
							<input type="password" required id="password" name="password" class="grow bg-[#fafafa] border-gray-400 password" placeholder="******" />
							<button type="button" class="text-gray-600 togglePassword hover:text-gray-800 focus:outline-none" onclick="showPassword()">
								<i data-feather="eye" class="h-4 w-4 iconShow"></i>
								<i data-feather="eye-off" class="h-4 w-4 hidden iconHide"></i>
							</button>
						</label>
					</div>

					<button type="submit" class="btn btn-block mt-4 text-base text-[#fafafa] hover:bg-blue-600 hover:text-[#fafafa] hover:border-none font-bold uppercase disabled:text-gray-600 disabled:cursor-not-allowed" aria-label="Submit">Masuk </button>
				</div>
			</form>
		</div>
	</section>

</section>
