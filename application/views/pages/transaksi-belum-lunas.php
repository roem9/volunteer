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
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table card-table table-vcenter text-dark">
                                    <thead>
                                        <tr>
                                            <th class="text-dark w-1 desktop text-nowrap" style="font-size: 11px">Tgl Transaksi</th>
                                            <th class="text-dark mobile-l mobile-p tablet-l tablet-p desktop" style="font-size: 11px">Nama Pelanggan</th>
                                            <th class="text-dark w-1 desktop" style="font-size: 11px">Jualan</th>
                                            <th class="text-dark desktop" style="font-size: 11px">Keterangan</th>
                                            <th class="text-dark w-1 desktop" style="font-size: 11px">Nominal</th>
                                            <th class="text-dark w-1 desktop" style="font-size: 11px"></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
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
        $("#transaksi").addClass("active")
        $("#transaksiBelumLunas").addClass("active")
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