<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'application/vendor/autoload.php';

use Dompdf\Dompdf;

class Pdfgenerator
{

    public function generate($html, $filename = '', $stream = TRUE, $paper = 'A4', $orientation = "portrait")
    {
        $dompdf = new DOMPDF();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->set_option("isPhpEnabled", true);
        $canvas = $dompdf->get_canvas();
        $canvas->page_script('
            if ($pdf->get_page_number() != $pdf->get_page_count()) {
                $font = Font_Metrics::get_font("helvetica", "12");                  
                $pdf->text(500, 770, "Page {PAGE_NUM} - {PAGE_COUNT}", $font, 10, array(0,0,0));
                $pdf->text(260, 770, "Canny Pack", $font, 10, array(0,0,0));
                $pdf->text(43, 770, $date, $font, 10, array(0,0,0));
            }
        ');
        $dompdf->render();
        if ($stream) {
            $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
        } else {
            return $dompdf->output();
        }
    }
}
