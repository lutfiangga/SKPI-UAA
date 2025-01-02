<?php
if (!function_exists('renderViewButton')) {
	function renderViewButton($label, $onClickFunction, $param)
	{
		return "<button type=\"button\" onclick=\"{$onClickFunction}('{$param}')\" class=\"flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-gray-200\">
            <div class=\"rounded-md text-white bg-blue-600 p-2\">
                <i data-feather=\"file-text\" class=\"w-6 h-auto\"></i>
            </div>
            <p class=\"text-sm text-blue-600 underline hidden sm:block  truncate\">{$label}</p>
        </button>";
	}
}

if (!function_exists('renderLink')) {
	function renderLink($label, $url)
	{
		return "<a href=\"{$url}\" target=\"_blank\" class=\"flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-gray-200\">
            <div class=\"rounded-md text-white bg-blue-600 p-2\">
                <i data-feather=\"link-2\" class=\"w-6 h-auto\"></i>
            </div>
            <p class=\"text-sm text-blue-600 underline hidden sm:block truncate\">{$label}</p>
        </a>";
	}
}
if (!function_exists('renderLinkButton')) {
	function renderLinkButton($label, $url)
	{
		return "<a href=\"{$url}\" target=\"_blank\" class=\"flex flex-row p-2 items-center gap-2 hover:rounded-lg hover:bg-gray-200\">
										<div class=\"rounded-md text-white bg-blue-600 p-2\">
											<i data-feather=\"link-2\" class=\"w-6 h-auto\"></i>
										</div>
										<p class=\"text-sm text-blue-600 underline truncate\">{$label}</p>
									</a>";
	}
}

if (!function_exists('renderStatus')) {
	function renderStatus($status)
	{
		$icons = [
			'pending' => ['text-orange-600', 'alert-circle', 'On Review'],
			'diterima' => ['text-green-600', 'check-circle', 'Verified'],
			'ditolak' => ['text-red-600', 'x-circle', 'Unverified'],
		];

		if (isset($icons[$status])) {
			[$color, $icon, $label] = $icons[$status];
			return "<span class=\"flex items-center text-sm gap-2 {$color} p-2 rounded-full\">
                <i data-feather=\"{$icon}\" class=\"w-4 h-auto\"></i>
                {$label}
            </span>";
		}
		return 'N/A';
	}
}

if (!function_exists('renderSpmActions')) {
	function renderSpmActions($status, $route, $idSpm, $id_akun, $keterangan)
	{
		if ($status === 'pending') {
			return "<a href=\"" . site_url($route . $idSpm . $id_akun) . "\" class=\"text-green-600 hover:scale-125 rounded-full p-2 flex items-center gap-2\">
                <i data-feather=\"check-circle\" class=\"w-4 h-auto\"></i>
                Diterima
            </a>
            <button onclick=\"openDeclineModal('{$idSpm}')\" class=\"text-red-600 hover:scale-125 rounded-full p-2 flex items-center gap-2\">
                <i data-feather=\"x-circle\" class=\"w-4 h-auto\"></i>
                Ditolak
            </button>";
		} elseif ($status === 'ditolak') {
			return "<p class=\"text-xs sm:text-sm text-gray-400\">{$keterangan}</p>";
		}
		return '<p class="text-xs sm:text-sm text-gray-400">No action needed</p>';
	}
}
