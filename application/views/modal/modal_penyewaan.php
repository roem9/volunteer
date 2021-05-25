<div class="modal modal-blur fade" id="editPenyewaan" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Penyewaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_sewa" class="form required">
                <div class="form-floating mb-3">
                    <select name="tipe" class='form form-control required'>
                        <option value="">Pilih Tipe Langganan</option>
                        <option value="Gerobak">Gerobak</option>
                        <option value="Lahan">Lahan</option>
                    </select>
                    <label>Tipe Langganan</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required rupiah' type="text" name="tarif">
                    <label>Tarif</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="periode" class='form form-control required'>
                        <option value="">Pilih Periode</option>
                        <option value="Harian">Harian</option>
                        <option value="Bulanan">Bulanan</option>
                    </select>
                    <label>Periode</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control number' type="text" name="tgl_tagihan">
                    <label>Tgl Penagihan</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="tempat">
                    <label>Lokasi Jualan</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="jualan">
                    <label>Jualan</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="keterangan" class="form form-control required" data-bs-toggle="autosize"></textarea>
                    <label>Keterangan</label>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btnEdit">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>