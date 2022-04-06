<?php
    function tgl_arab($tgl){
        $data = explode("-", $tgl);
        $hari = angka_arab($data[0]);
        $bulan = bulan_arab($data[1]);
        $tahun = angka_arab($data[2]);

        return $hari . " مِنْ " . $bulan . " " . $tahun;
    }

    function bulan_arab($data){
        if($data == "01") return "يناير";
        if($data == "02") return "فبراير";
        if($data == "03") return "مارس";
        if($data == "04") return "أبريل";
        if($data == "05") return "مايو";
        if($data == "06") return "يونيو";
        if($data == "07") return "يوليو";
        if($data == "08") return "أغسطس";
        if($data == "09") return "سبتمبر";
        if($data == "10") return "أكتوبر";
        if($data == "11") return "نوفمبر";
        if($data == "12") return "ديسمبر";
    }
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .qrcode{
			position: absolute;
			left: 570px;
			top: 640px;
            font-size: 17px;
		}

        .nama{
            /* background-color: red; */
            width: 800px;
            left: 220px;
			position: absolute;
			/* left: 465px; */
			top: 380px;
            font-size: 60px;
            font-family: 'nama';
            color: #14833C;
		}

        .nominal{
            /* background-color: red; */
            width: 800px;
            left: 220px;
			position: absolute;
			top: 460px;
            font-size: 40px;
            font-family: 'angka';
            color: #14833C;
		}

        body {
            width: 100%;
            height: 100%;
        }

        @page :first {
            background-image: url('<?= base_url()?>assets/img/sertifikat.jpg');
            background-image-resize: 6;
        }
    </style>
</head>
    <body>
        <div class="qrcode">
            <img src="<?= base_url()?>assets/qrcode/<?= $id_waqif?>.png" width=100 alt="">
        </div>
        
        <div class="nama" style="text-align: center">
            <span style="text-align: center">
                <?= $nama_waqif?>
            </span>
        </div>

        <div class="nominal" style="text-align: center">
            <span style="text-align: center">
                <?= rupiah($nominal)?>
            </span>
        </div>
    </body>
</html>