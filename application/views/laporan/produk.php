
<div class="container-fluid">

    <h3>Laporan Data Produk</h3>

    <form method="get">

        <div class="row">

            <div class="col-md-4">

                <label>Pilih Produk</label>

                <select name="id_produk" class="form-control">

                    <option value="">-- Semua Produk --</option>

                    <?php foreach($produk as $p): ?>

                    <option value="<?= $p->id_produk; ?>"
                        <?= ($id_produk == $p->id_produk) ? 'selected' : ''; ?>>

                        <?= $p->nama_produk; ?>

                    </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <div class="col-md-4 mt-4">

                <button type="submit"
                        class="btn btn-primary btn-sm">
                    Filter
                </button>

                <a href="<?= site_url('laporan/produk'); ?>"
                   class="btn btn-secondary btn-sm">
                    Reset
                </a>

            </div>

        </div>

    </form>

    <br>

    <a href="<?= site_url('laporan/cetak_produk?id_produk='.$id_produk); ?>"
       target="_blank"
       class="btn btn-success btn-sm">
       Cetak PDF
    </a>

    <table class="table table-bordered mt-3">

        <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Terjual</th>
        </tr>

        <?php $no=1; foreach($data as $d): ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d->kode; ?></td>
            <td><?= $d->nama_produk; ?></td>
            <td>Rp <?= number_format($d->harga,0,',','.'); ?></td>
            <td><?= $d->stok; ?></td>
            <td><?= $d->terjual; ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

</div>

