<div class="modal modal-blur fade" id="addPemasukan" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pemasukan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-3">
                        <input class='form form-control required' type="date" name="tgl_pemasukan">
                        <label>Tgl. Pemasukan</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class='form form-control required' type="text" name="pelaku">
                        <label>Sumber</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class='form form-control required rupiah' type="text" name="nominal">
                        <label>Nominal</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="keterangan" class="form form-control required" data-bs-toggle="autosize"></textarea>
                        <label>Keterangan</label>
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

<div class="modal modal-blur fade" id="editPemasukan" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pemasukan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_pemasukan" class="form required">
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="date" name="tgl_pemasukan">
                    <label>Tgl. Pemasukan</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="pelaku">
                    <label>Sumber</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required rupiah' type="text" name="nominal">
                    <label>Nominal</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="keterangan" class="form form-control required" data-bs-toggle="autosize"></textarea>
                    <label>Keterangan</label>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success btnEdit">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="addPengeluaran" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengeluaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-3">
                        <input class='form form-control required' type="date" name="tgl_pengeluaran">
                        <label>Tgl. Pengeluaran</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class='form form-control required' type="text" name="pelaku">
                        <label>Sumber</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class='form form-control required rupiah' type="text" name="nominal">
                        <label>Nominal</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="keterangan" class="form form-control required" data-bs-toggle="autosize"></textarea>
                        <label>Keterangan</label>
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

<div class="modal modal-blur fade" id="editPengeluaran" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pengeluaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_pengeluaran" class="form required">
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="date" name="tgl_pengeluaran">
                    <label>Tgl. Pengeluaran</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="pelaku">
                    <label>Sumber</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required rupiah' type="text" name="nominal">
                    <label>Nominal</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="keterangan" class="form form-control required" data-bs-toggle="autosize"></textarea>
                    <label>Keterangan</label>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success btnEdit">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="addTransaksiPenyewaan" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-3">
                        <select name="status" class="form form-control required">
                            <option value="">Pilih Status</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                        <label>Status</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="pelanggan" class="form-control required">
                            <option value="">Pilih Pelanggan</option>
                            <?php foreach ($langganan as $data) :?>
                                <option value="<?= $data['id_sewa']?>|<?= $data['tarif']?>"><?= $data['jualan']?> - <?= $data['nama_pelanggan']?></option>
                            <?php endforeach;?>
                        </select>
                        <label>Pelanggan</label>
                    </div>
                    <input type="hidden" name="id_sewa" class="form required">
                    <div class="form-floating mb-3">
                        <input class='form form-control required' type="date" name="tgl_transaksi">
                        <label>Tgl. Transaksi</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class='form form-control required rupiah' type="text" name="nominal">
                        <label>Nominal</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="keterangan" class="form form-control required" data-bs-toggle="autosize"></textarea>
                        <label>Keterangan</label>
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

<div class="modal modal-blur fade" id="editTransaksiPenyewaan" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_transaksi" class="form required">
                <div class="form-floating mb-3">
                    <select name="status" class="form form-control required">
                        <option value="">Pilih Status</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                    <label>Status</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form-control' type="text" name="nama_pelanggan" readonly>
                    <label>Nama Pelanggan</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form-control' type="text" name="jualan" readonly>
                    <label>Jualan</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="date" name="tgl_transaksi">
                    <label>Tgl. Transaksi</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required rupiah' type="text" name="nominal">
                    <label>Nominal</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="keterangan" class="form form-control required" data-bs-toggle="autosize"></textarea>
                    <label>Keterangan</label>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success btnEdit">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>