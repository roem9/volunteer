<div class="modal modal-blur fade" id="addWaqif" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Waqif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="user" id="formAddWaqif" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="date" name="tgl_waqaf" class="form form-control form-control-sm" value="<?= date("Y-m-d");?>">
                        <label class="col-form-label">Tgl. Waqaf</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="nama_waqif" class="form form-control form-control-sm required">
                        <label class="col-form-label">Nama Waqif</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="nominal" class="form form-control form-control-sm required rupiah">
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
                        <input type="text" name="nama_volunteer" class="form form-control form-control-sm">
                        <label class="col-form-label">Volunteer</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" name="file" id="file" class="form-control">
                        <label for="">Foto</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btnTambah">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="detailWaqif" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Waqif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="img-detail" src="" class="mb-3">
                <form class="user" id="formEditWaqif">
                    <input type="hidden" name="id_waqif" class="form required">
                    <div class="form-floating mb-3">
                        <input type="date" name="tgl_waqaf" class="form form-control form-control-sm required">
                        <label class="col-form-label">Tgl. Waqaf</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="nama_waqif" class="form form-control form-control-sm required">
                        <label class="col-form-label">Nama Waqif</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="nominal" class="form form-control form-control-sm required rupiah">
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
                        <input type="text" name="nama_volunteer" class="form form-control form-control-sm">
                        <label class="col-form-label">Volunteer</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" name="file" id="file" class="form-control">
                        <label for="">Foto</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success btnEdit">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</div>