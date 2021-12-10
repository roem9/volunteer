<?php $this->load->view("_partials/header")?>
    <div class="wrapper">
        <div class="sticky-top">
            <?php $this->load->view("_partials/navbar")?>
        </div>
        <div class="page-wrapper">
        <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                        <h2 class="page-title text-nowrap">
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
                            <?php if($this->session->userdata("pesan")) :?>
                                <?= $this->session->userdata("pesan");?>
                            <?php endif;?>

                            <form action="<?= base_url()?>sales/add_registrasi_marketing" method="POST" id="formLadingPage">
                                <div class="form-floating mb-3">
                                    <select name="panggilan" class="form-control form-control-sm" required>
                                        <option value="">Pilihan Panggilan</option>
                                        <option value="Mas">Mas</option>
                                        <option value="Mba">Mba</option>
                                        <option value="Bapak">Bapak</option>
                                        <option value="Ibu">Ibu</option>
                                    </select>
                                    <label for="">Panggilan</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="nama" class="form form-control form-control-sm" required>
                                    <label class="col-form-label">Nama Lengkap</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="nama_panggilan" class="form form-control form-control-sm" required>
                                    <label class="col-form-label">Nama Panggilan</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="no_wa" class="form form-control form-control-sm number" required>
                                    <label class="col-form-label">No. WhatsApp</label>
                                    <small class="text-danger">*Isi nomor whatsapp dengan menggunakan kode negara. Misal 081234567890 menjadi 6281234567890</small>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="email" class="form form-control form-control-sm" required>
                                    <label class="col-form-label">Email</label>
                                    <small class="text-danger">*Isi menggunakan email yang valid, karena link akan dikirim ke email</small>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-md btn-primary" id="btnSimpan">Simpan</button>
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

    <script>
        $("#btnSimpan").click(function(){

            Swal.fire({
                icon: 'question',
                html: 'Yakin akan menyimpan data Anda dan membuat landing page?',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then(function (result) {
                if (result.value) {
                    swal.fire({
                        html: '<h4>Menyimpan Data Anda ...</h4>',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        },
                    });

                    $("#btnSimpan").html("Menyimpan...");
                    $("#formLadingPage").submit()
                }
            })
        })
    </script>

    
<?php $this->load->view("_partials/footer")?>