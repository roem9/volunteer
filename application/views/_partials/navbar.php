<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
        <div class="container-xl">
            <ul class="navbar-nav">
            <li class="nav-item" id="home">
                <a class="nav-link" href="<?= base_url()?>home" >
                <?= tablerIcon("home", "nav-link-icon")?>
                <span class="nav-link-title">
                    Dashboard
                </span>
                </a>
            </li>
            <li class="nav-item" id="rekap">
                <a class="nav-link" href="<?= base_url()?>transaksi/rekap" >
                <?= tablerIcon("report-money", "nav-link-icon")?>
                <span class="nav-link-title">
                    Rekap
                </span>
                </a>
            </li>
            <li class="nav-item dropdown" id="transaksi">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                <?= tablerIcon("cash-banknote", "nav-link-icon")?>
                <span class="nav-link-title">
                    Transaksi
                </span>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                        <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="<?= base_url()?>transaksi/belumlunas" id="transaksiBelumLunas">
                            Belum Lunas
                        </a>
                        <a class="dropdown-item" href="<?= base_url()?>transaksi/penyewaan" id="transaksiPenyewaan">
                            Penyewaan
                        </a>
                        <a class="dropdown-item" href="<?= base_url()?>transaksi/pemasukan" id="transaksiPemasukan">
                            Pemasukan
                        </a>
                        <a class="dropdown-item" href="<?= base_url()?>transaksi/pengeluaran" id="transaksiPengeluaran">
                            Pengeluaran
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown" id="pelanggan">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                <?= tablerIcon("users", "nav-link-icon")?>
                <span class="nav-link-title">
                    Pelanggan
                </span>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                        <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="<?= base_url()?>pelanggan" id="listPelanggan">
                            List Pelanggan
                        </a>
                        <a class="dropdown-item" href="<?= base_url()?>penyewaan" id="listPenyewaan">
                            List Penyewaan
                        </a>
                    </div>
                </div>
            </li>
            </ul>
        </div>
        </div>
    </div>
</div>