<body style="background-color: #EEF0F6">
	<!-- Top Navbar -->
	<?php $this->load->view('admin/layout/topbar.php'); ?>

	<!-- Sidebar-->
	<?php $this->load->view('admin/layout/sidebar.php'); ?>

	<!-- Main Content -->
	<main class="flex-grow flex flex-col justify-between p-8 mt-16 lg:ml-[300px] ml-0 transition-all duration-300 min-h-dvh">
		<?= $contents; ?>
		<div class="bg-[#fafafa] flex justify-center rounded-2xl px-8 py-4 text-gray-400 text-sm font-semibold">
			Universitas Alma Ata &copy;<?= date('Y'); ?>. All Right Reserved.
		</div>
	</main>

	<?php $this->load->view('layout/script'); ?>
</body>

</html>
