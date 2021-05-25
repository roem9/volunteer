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
                    <div class="card shadow mb-4" id="dataPc" style="display:none">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table card-table table-vcenter text-nowrap text-dark">
                                    <thead>
                                        <tr>
                                            <th class="text-dark w-1" style="font-size: 11px">No</th>
                                            <th class="text-dark" style="font-size: 11px">Periode</th>
                                            <th class="text-dark" style="font-size: 11px">Pemasukan</th>
                                            <th class="text-dark" style="font-size: 11px">Pengeluaran</th>
                                            <th class="text-dark" style="font-size: 11px">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $total = 0;
                                            foreach ($rekap as $i => $rekap) :
                                            $total += $rekap['pemasukan'] - $rekap['pengeluaran'];
                                        ?>
                                            <tr>
                                                <td><?= $i + 1?></td>
                                                <td><?= $rekap['periode']?></td>
                                                <td><?= rupiah($rekap['pemasukan'])?></td>
                                                <td><?= rupiah($rekap['pengeluaran'])?></td>
                                                <td><?= rupiah($rekap['pemasukan'] - $rekap['pengeluaran'])?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4" style="text-align:right">Total </th>
                                            <th><?= rupiah($total)?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-block d-sm-none mb-3">
                        <div id="skeleton">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="card">
                                    <div class="ratio ratio-21x9 card-img-top">
                                        <div class="skeleton-image"></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="skeleton-heading"></div>
                                        <div class="skeleton-line"></div>
                                        <div class="skeleton-line"></div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="card">
                                    <div class="ratio ratio-21x9 card-img-top">
                                        <div class="skeleton-image"></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="skeleton-heading"></div>
                                        <div class="skeleton-line"></div>
                                        <div class="skeleton-line"></div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="card">
                                    <div class="ratio ratio-21x9 card-img-top">
                                        <div class="skeleton-image"></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="skeleton-heading"></div>
                                        <div class="skeleton-line"></div>
                                        <div class="skeleton-line"></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cards FieldContainer" data-masonry='{"percentPosition": true }' id="dataAjax">
                        
                    </div>

                    <!-- Paginate -->
                    <div class="row" id="paging">
                        <div class="col-12">
                            <div class="mt-3" id='pagination'></div>
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
        $("#rekap").addClass("active")
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