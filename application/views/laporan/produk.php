
<div class="container-fluid">

    <h2 class="h3 mb-4 text-gray-800">
        Laporan Data Produk
    </h2>

    <div class="card shadow border-0 mb-4">

        <div class="card-header"
             style="background:#97B38C;color:white;">

            <h5 class="mb-0">
                Filter Produk
            </h5>

        </div>

        <div class="card-body">

            <form method="get">

                <div class="row">

                    <div class="col-md-5">

                        <label>
                            Pilih Produk
                        </label>

                        <select name="id_produk"
                                class="form-control">

                            <option value="">
                                -- Semua Produk --
                            </option>

                            <?php foreach($produk as $p): ?>

                            <option value="<?= $p->id_produk; ?>"
                                <?= ($id_produk == $p->id_produk) ? 'selected' : ''; ?>>

                                <?= $p->nama_produk; ?>

                            </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="col-md-4">

                        <label>&nbsp;</label>

                        <div>

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fas fa-search"></i>
                                Filter

                            </button>

                            <a href="<?= site_url('laporan/produk'); ?>"
                               class="btn btn-secondary">

                                <i class="fas fa-sync"></i>
                                Reset

                            </a>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <a href="<?= site_url('laporan/cetak_produk?id_produk='.$id_produk); ?>"
       target="_blank"
       class="btn btn-success mb-3">

        <i class="fas fa-print"></i>
        Cetak PDF

    </a>

    <div class="card shadow border-0">

        <div class="card-header"
             style="background:#97B38C;color:white;">

            <h5 class="mb-0">
                Data Produk
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover table-bordered">

                    <thead class="thead-light">

                        <tr>

                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Terjual</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $no=1; ?>

                        <?php foreach($data as $d): ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td>
                                <?= $d->kode; ?>
                            </td>

                            <td>
                                <?= $d->nama_produk; ?>
                            </td>

                            <td>
                                Rp <?= number_format($d->harga,0,',','.'); ?>
                            </td>

                            <td>

                                <?php if($d->stok <= 5): ?>

                                    <span class="badge badge-danger">
                                        <?= $d->stok; ?>
                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-success">
                                        <?= $d->stok; ?>
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <span class="badge badge-info">
                                    <?= $d->terjual; ?>
                                </span>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
