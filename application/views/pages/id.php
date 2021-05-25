<!DOCTYPE html>
<html lang="en">
    <style>
        .qrcode{
            position: absolute;
            top: 25px;
            left: 35px;
        }
    </style>
<body>
    <div class="qrcode">
        <img src="<?= base_url()?>assets/qrcode/<?= $qrcode?>.png" width="80px" height="80px"/>
    </div>
    <img src="<?= base_url()?>assets/img/card_depan.jpg" width="340px" height="207px"/>
    <img src="<?= base_url()?>assets/img/card_belakang.jpg" width="340px" height="207px"/>
</body>
</html>