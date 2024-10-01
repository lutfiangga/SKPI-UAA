<body style="background-color: #EEF0F6">
	<!-- Top Navbar -->
	<?php $this->load->view('layout/components/topbar'); ?>

	<!-- Sidebar-->
	<?php $this->load->view('layout/components/sidebar'); ?>

	<main class="flex-grow flex flex-col gap-2 md:gap-4 justify-between p-8 mt-16 lg:ml-[300px] ml-0 transition-all duration-300 min-h-dvh">
		<?php if ($this->session->flashdata('error_403')): ?>
			<div id="alert" role="alert" class="alert alert-error mb-4">
				<button type="button" onclick="document.getElementById('alert').style.display = 'none'">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
					</svg>
				</button>
				<span><?= $this->session->flashdata('error_403'); ?></span>
			</div>
		<?php endif; ?>

		<!-- csrf token -->
		<?php if (!$this->session->csrf_token) {
			$this->session->csrf_token = hash('sha1', time());
		} ?>
		<!-- main content -->
		<?= $contents; ?>
		<?php $this->load->view('layout/components/footer'); ?>
	</main>


	<?php $this->load->view('layout/script'); ?>
</body>

</html>
