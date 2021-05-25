<?php $this->load->view("_partials/header")?>
    <div class="wrapper">
        <div class="sticky-top">
            <?php $this->load->view("_partials/navbar-header")?>
            <?php $this->load->view("_partials/navbar")?>
        </div>
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                        <h2 class="page-title">
                            <?= $title?>
                        </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards FieldContainer" data-masonry='{"percentPosition": true }' id="dataAjax">

                        <div class="col-sm-12 col-md-6">
                            <div class="card bg-green-lt mb-3">
                                <div class="row row-0">
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <svg width="70" height="70">
                                            <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-coin" />
                                        </svg>
                                    </div>
                                    <div class="col">
                                        <div class="card-body">
                                            <h3 class="card-title">Saldo</h3>
                                            <h2><?= rupiah($saldo)?></h2>
                                            <div class="d-flex justify-content-start">
                                                <a href="<?= base_url()?>transaksi/rekap" class="btn btn-info">
                                                    Detail
                                                    <?= tablerIcon("chevrons-right", "ms-1")?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if($transaksi != 0) :?>
                            <div class="col-sm-12 col-md-6">
                                <div class="card bg-red-lt mb-3">
                                    <div class="row row-0">
                                        <div class="col-3 d-flex align-items-center justify-content-center">
                                            <svg width="70" height="70">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-report-money" />
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <div class="card-body">
                                                <h3 class="card-title">Transaksi Belum Lunas</h3>
                                                <h2><?= $transaksi?> Transaksi</h2>
                                                <div class="d-flex justify-content-start">
                                                    <a href="<?= base_url()?>transaksi/belumlunas" class="btn btn-info">
                                                        Detail
                                                        <?= tablerIcon("chevrons-right", "ms-1")?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>

                        <?php if($penagihan != 0) :?>
                            <div class="col-sm-12 col-md-6">
                                <div class="card bg-red-lt mb-3">
                                    <div class="row row-0">
                                        <div class="col-3 d-flex align-items-center justify-content-center">
                                            <svg width="70" height="70">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-users" />
                                            </svg>
                                        </div>
                                        <div class="col">
                                            <div class="card-body">
                                                <h3 class="card-title">Penagihan</h3>
                                                <h2><?= $penagihan?> Pelanggan</h2>
                                                <div class="d-flex justify-content-start">
                                                    <a href="<?= base_url()?>penyewaan" class="btn btn-info">
                                                        Detail
                                                        <?= tablerIcon("chevrons-right", "ms-1")?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>

                </div>

            </div>
            <?php $this->load->view("_partials/footer-bar")?>
        </div>
    </div>

    <!-- load modal -->
    <?php 
        if(isset($modal)) :
            foreach ($modal as $i => $modal) {
                $this->load->view("modal/".$modal);
            }
        endif;
    ?>

    <script>
        $("#home").addClass("active")
    </script>

    <!-- load javascript -->
    <?php  
        if(isset($js)) :
            foreach ($js as $i => $js) :?>
                <script src="<?= base_url()?>assets/myjs/<?= $js?>"></script>
                <?php 
            endforeach;
        endif;    
    ?>
    
<?php $this->load->view("_partials/footer")?>