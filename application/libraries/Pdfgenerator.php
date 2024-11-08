<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once 'dompdf-master/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator
{
	public function generate($html, $filename = '', $paper = 'A4', $orientation = 'portrait', $stream = TRUE)
	{
		$options = new Options();
		$options->set('isRemoteEnabled', TRUE); // Enable remote resources
		$options->set('defaultFont', 'Arial'); // Set default font if necessary
		$dompdf = new Dompdf($options);

		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);
		$dompdf->render();

		if ($stream) {
			$dompdf->stream($filename . ".pdf", array("Attachment" => 0));
		} else {
			return $dompdf->output();
		}
	}
}
