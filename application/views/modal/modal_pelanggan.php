<div class="modal modal-blur fade" id="addPelanggan" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-3">
                        <input class='form form-control required number' type="text" name="no_ktp">
                        <label>No. KTP</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class='form form-control required' type="text" name="nama_pelanggan">
                        <label>Nama Pelanggan</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class='form form-control required number' type="text" name="no_hp">
                        <label>No Hp</label>
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
                    <button type="button" class="btn btn-success btnTambah">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="detailPelanggan" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_pelanggan" class="form required">
                <div class="form-floating mb-3">
                    <input class='form form-control required number' type="text" name="no_ktp">
                    <label>No. KTP</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="nama_pelanggan">
                    <label>Nama Pelanggan</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required number' type="text" name="no_hp">
                    <label>No Hp</label>
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

<div class="modal modal-blur fade" id="detailLangganan" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="card">
                    <ul class="nav nav-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a href="#tabs-add" class="nav-link active" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <?= tablerIcon("shopping-cart-plus", "me-0")?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-list" class="nav-link" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                <?= tablerIcon("shopping-cart", "me-0")?>
                            </a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-add">
                                <input type="hidden" name="id_pelanggan" class="form required">
                                <form>
                                    <h4 class="mb-3">Tambah Langganan</h4>
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
                                        <label>Tempat Jualan</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class='form form-control required' type="text" name="jualan">
                                        <label>Jualan</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea name="keterangan" class="form form-control required" data-bs-toggle="autosize"></textarea>
                                        <label>Keterangan</label>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary btnTambah">Tambah</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tabs-list">
                                <h4 class="mb-3">List Langganan <span id="countList">0</span></h4>
                                <div id="listLangganan"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>