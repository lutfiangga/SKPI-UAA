<section class="">
	<div class="flex flex-row justify-bertween items-center">
		<div class="flex flex-row justify-start items-center gap-4">
			<h1 class="md:text-3xl text-xl font-bold text-blue-600">Verifikasi SKPI</h1>
			<div class="bg-blue-600 md:p-3 p-2 text-[#fafafa] rounded-lg">
				<i data-feather="award" fill="currentColor" class="w-4 h-4 md:h-[24px] md:w-[24px]"></i>
			</div>
		</div>
	</div>
	<div class="divider border-gray-300"></div>
	<div class="flex justify-between">
		<p class="text-gray-600 uppercase tracking-wide font-bold">Terakhir Diminta</p>
		<a href="#mytable" class="tetx-gray-400 text-sm font-thin flex items-center flex-row whitespace-nowrap justify-center">Lihat semua <i data-feather="chevrons-right" class="mt-1"></i></a>

	</div>
	<!-- card -->
	<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 my-4 lg:my-8 md:my-6">
		<!-- card -->
		<div class="flex flex-col col-span-1 text-blue-600">
			<div class="bg-[#fafafa] rounded-t-2xl flex flex-row p-4 w-3/4 items-center gap-4" style="clip-path: polygon(0 0, 83% 0, 100% 100%, 0% 100%);">
				<i data-feather="clock"></i>
				<div class="flex flex-col uppercase tracking-wide items-start">
					<p class="text-[0.6rem]">diunggah tanggal</p>
					<p class="text-sm font-semibold">12 Februari 2022</p>
				</div>
			</div>
			<div class="bg-[#fafafa] rounded-b-2xl rounded-tr-2xl p-4">
				<div class="flex flex-row justify-between mx-2 items-center gap-2 hover:rounded-lg hover:bg-[#e7ecfb] cursor-pointer">
					<div>
						<div class="rounded-md text-[#fafafa] bg-blue-600 p-4">
							<i data-feather="file-text"></i>
						</div>
					</div>
					<p class="text-sm w-full whitespace-wrap font-thin">Lorem ipsum dolor sit amet consectetur adipisicing elit.pdf</p>
				</div>
				<div class="flex flex-row gap-4 items-center mt-6 text-gray-500">
					<img src="https://via.placeholder.com/40" alt="role" class="rounded-full w-8 h-8">
					<p class="truncate w-full ml-2 font-semibold">Mahasiswa aktif tahun ajaran 2020</p>
				</div>
			</div>
		</div>
		<!-- card -->
	</section>


	<div class="divider border-gray-300"></div>
	<div class="flex justify-between">
		<p class="text-gray-600 uppercase tracking-wide font-bold">Semua Permintaan SKPI</p>
		<a href="#" class="tetx-gray-400 text-sm font-thin flex items-center flex-row whitespace-nowrap justify-center">Lihat semua <i data-feather="chevrons-right" class="mt-1"></i></a>
	</div>

</section>
<section>
	<button id="download_skpi" type="button" class="btn">Download skpi</button>
	<div id="skpi" class="hidden">
		<iframe src="<?= site_url('Mahasiswa/Skpi_Mahasiswa/export_pdf'); ?>" class="w-full" frameborder="0"></iframe>
	</div>
</section>
<script>
	$('#download_skpi').click(function() {
		const iframe = document.querySelector('#skpi iframe');
		iframe.contentWindow.focus();
		iframe.contentWindow.print();
	});
</script>