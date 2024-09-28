<body style="background-color: #EEF0F6">
	<!-- Top Navbar -->
	<?php $this->load->view('layout/components/topbar'); ?>

	<!-- Sidebar-->
	<?php $this->load->view('admin/layout/sidebar'); ?>

	<!-- Main Content -->
	<main class="flex-grow flex flex-col justify-between p-8 mt-16 lg:ml-[300px] ml-0 transition-all duration-300 min-h-dvh">
		<?= $contents; ?>
		<?php $this->load->view('layout/components/footer'); ?>
	</main>

	<?php $this->load->view('layout/script'); ?>
</body>

</html>
