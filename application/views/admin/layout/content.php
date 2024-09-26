<body style="background-color: #EEF0F6">
	<!-- Top Navbar -->
	<?php $this->load->view('layout/components/topbar.php'); ?>

	<!-- Sidebar-->
	<?php $this->load->view('admin/layout/sidebar.php'); ?>

	<!-- Main Content -->
	<main class="flex-grow flex flex-col justify-between p-8 mt-16 lg:ml-[300px] ml-0 transition-all duration-300 min-h-dvh">
		<?= $contents; ?>
		<?php $this->load->view('layout/components/footer.php'); ?>
	</main>

	<?php $this->load->view('layout/script.php'); ?>
</body>

</html>