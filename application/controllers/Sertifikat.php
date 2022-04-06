<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends MY_Controller {
    
    public function no($id_waqif){
        $waqif = $this->sertifikat->get_one("waqif", ["md5(id_waqif)" => $id_waqif]);

        if($waqif){
            $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
            $fontData = $defaultFontConfig['fontdata'];
            
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [214, 330], 'orientation' => 'L',
            // , 'margin_top' => '43', 'margin_left' => '25', 'margin_right' => '25', 'margin_bottom' => '35',
                'fontdata' => $fontData + [
                    'arab' => [
                        // 'R' => 'tradbdo.ttf',
                        'R' => 'trado.ttf',
                        // 'R' => 'utsman.ttf',
                        'useOTL' => 0xFF,
                        'useKashida' => 75,
                    ],
                    'arial' => [
                        // 'R' => 'tradbdo.ttf',
                        'R' => 'arial.ttf',
                        'useOTL' => 0xFF,
                        'useKashida' => 75,
                    ],
                    'nama' => [
                        'R' => 'KaushanScript-Regular.ttf',
                    ],
                    'angka' => [
                        'R' => 'Montserrat-SemiBold.ttf',
                        // Montserrat-SemiBold.ttf
                        // Montserrat.ttf
                    ],
                ], 
            ]);
    
            $mpdf->SetTitle("{$waqif['nama_waqif']} - {$waqif['nominal']}");
    
            $mpdf->WriteHTML($this->load->view('sertifikat/sertifikat', $waqif, TRUE));
    
            $mpdf->Output("{$waqif['nama_waqif']}-{$waqif['nominal']}.pdf", "I");
        } else {
            redirect('https://tamantahfidzfirdaus.org');
        }
        
    }
}