<body class="bg-[#fafafa] h-screen flex items-center justify-center px-4 py-2 md:px-8 md:py-6 lg::px-12 lg:py-8">
	<!-- main content -->
	<!-- csrf token -->
	<?php if (!$this->session->csrf_token) {
		$this->session->csrf_token = hash('sha1', time());
	} ?>
	<?= $contents; ?>
</body>

</html>
