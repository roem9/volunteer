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
                            <?php if($this->session->userdata("pesan")) :?>
                                <?= $this->session->userdata("pesan");?>
                            <?php else :?>
                                <form action="<?= base_url()?>daftarlandingpage/add_registrasi_marketing" method="POST" id="formLadingPage">
                                    <div class="mb-3">
                                        <input type="hidden" name="project" class="form form-control form-control-md" value="<?= $project?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Panggilan</label>
                                        <select name="panggilan" class="form-control form-control-md required" required>
                                            <option value="">Pilihan Panggilan</option>
                                            <option value="Mas">Mas</option>
                                            <option value="Mba">Mba</option>
                                            <option value="Bapak">Bapak</option>
                                            <option value="Ibu">Ibu</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form form-control form-control-md required" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Nama Panggilan</label>
                                        <input type="text" name="nama_panggilan" class="form form-control form-control-md required" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">No. WhatsApp</label>
                                        <input type="text" name="no_wa" class="form form-control form-control-md required number" placeholder="6281234567890" required>
                                        <small class="text-danger">*Isi nomor whatsapp dengan menggunakan kode negara. Misal 081234567890 menjadi 6281234567890</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Email Aktif</label>
                                        <input type="text" name="email" class="form form-control form-control-md required" placeholder="aliel@gmail.com" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Link Landing Page</label>
                                        <input type="text" name="id_name" class="form form-control form-control-md required" placeholder="alielfarabie" required>
                                        <small class="text-danger">*isi link untuk menetukan link landing page Anda. Link hanya berupa angka dan alphabet</small>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-md btn-info" id="btnCek">Cek Link</button>
                                        <button style="display:none" type="button" class="btn btn-md btn-primary" id="btnSimpan">Simpan</button>
                                    </div>
                                </form>
                            <?php endif;?>
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
        $("[name='id_name']").on({
            keydown: function(e) {
                var regex = new RegExp("^[a-zA-Z0-9\b]+$");
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if (regex.test(str)) {
                    return true;
                }
                e.preventDefault();
                return false;
            // if (e.which === 32 || e.which === 13)
            //     return false;
            },
            keyup: function(){
                this.value = this.value.toLowerCase();
            },
            change: function() {
                this.value = this.value.replace(/\s/g, "");
            }
        });

        $("[name='id_name'").on("keyup change", function(){
            $("#btnSimpan").hide();
            $("#btnCek").show();
            $("#btnCek").prop('disabled', false);
        })

        $("#btnCek").click(function(){
            $("#btnCek").prop('disabled', true);
            id_name = $("[name='id_name']").val();
            project = $("[name='project']").val();
            if(id_name == ""){
                Swal.fire({
                    icon: "error",
                    text: "Username tidak dapat digunakan",
                })
                $("[name='id_name']").val("");
                $("#btnCek").prop('disabled', true);

            } else {
                let result = ajax(url_base+"daftarlandingpage/get_username", "POST", {id_name:id_name, project:project});
                if(result){
                    Swal.fire({
                        icon: "error",
                        text: "Username "+id_name+" telah digunakan",
                    })
                    $("[name='id_name']").val("");
                    $("#btnCek").prop('disabled', false);
                } else {
                    Swal.fire({
                        icon: "success",
                        text: "Username "+id_name+" bisa digunakan. Silakan menyimpan data Anda",
                    })
                    $("#btnCek").hide();
                    $("#btnSimpan").show();
                }
            }
        })

        $("#btnSimpan").click(function(){
            let eror = required("#formLadingPage");
            if(eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {
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
                        $("#formLadingPage").submit();
                    }
                })
            }
        })

        var clipboard = new ClipboardJS('.copy');

        clipboard.on('success', function(e) {
            Swal.fire({
                icon: "success",
                text: "Berhasil menyalin link",
                showConfirmButton: false,
                timer: 1500
            })
        });
    </script>

    
<?php $this->load->view("_partials/footer")?>