<?php $this->load->view("_partials/header")?>
    <div class="wrapper">
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
                            <form target="_blank" method="post" action="<?= base_url()?>inputsertifikat/add_waqif" enctype="multipart/form-data" id="formWaqif">
                                <div class="form-floating mb-3">
                                    <input type="date" name="tgl_waqaf" class="form form-control form-control-sm" value="<?= date("Y-m-d");?>">
                                    <label class="col-form-label">Tgl. Waqaf</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="nama_waqif" class="form form-control form-control-sm" required>
                                    <label class="col-form-label">Nama Pewaqif</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="nominal" class="form form-control form-control-sm rupiah" required>
                                    <label class="col-form-label">Nominal</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="no_wa" class="form form-control form-control-sm number">
                                    <label class="col-form-label">No. Whatsapp</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="email" class="form form-control form-control-sm">
                                    <label class="col-form-label">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="nama_volunteer" class="form form-control form-control-sm" required>
                                    <label class="col-form-label">Volunter</label>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="reset" class="btn btn-md btn-light me-3" value="Reset">
                                    <input type="submit" class="btn btn-md btn-primary" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <?php $this->load->view("_partials/footer-bar")?>
        </div>
    </div>

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