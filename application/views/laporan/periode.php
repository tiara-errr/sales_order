
<div class="container-fluid">

    <h3>Laporan Penjualan Per Periode</h3>

    <form method="get">

        <div class="row">

            <div class="col-md-3">
                <label>Tanggal Awal</label>

                <input type="date"
                       name="tanggal_awal"
                       value="<?= $tanggal_awal; ?>"
                       class="form-control">
            </div>

            <div class="col-md-3">
                <label>Tanggal Akhir</label>

                <input type="date"
                       name="tanggal_akhir"
                       value="<?= $tanggal_akhir; ?>"
                       class="form-control">
            </div>

            <div class="col-md-3 mt-4">

                <button type="submit"
                        class="btn btn-primary btn-sm">
                    Filter
                </button>

                <a href="<?= site_url('laporan/periode'); ?>"
                   class="btn btn-secondary btn-sm">
                    Reset
                </a>

            </div>

        </div>

    </form>

    <br>

    <a href="<?= site_url('laporan/cetak_periode?tanggal_awal='.$tanggal_awal.'&tanggal_akhir='.$tanggal_akhir); ?>"
       target="_blank"
       class="btn btn-success btn-sm">
       Cetak PDF
    </a>

    <table class="table table-bordered mt-3">

        <tr>
            <th>No</th>
            <th>Kode Order</th>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>Sales</th>
            <th>Total Harga</th>
            <th>Status</th>
        </tr>

        <?php $no=1; foreach($data as $d): ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d->kode_order; ?></td>
            <td><?= $d->tanggal_order; ?></td>
            <td><?= $d->nama_pelanggan; ?></td>
            <td><?= $d->nama_sales; ?></td>
            <td>
                Rp <?= number_format($d->total_harga,0,',','.'); ?>
            </td>
            <td><?= ucfirst($d->status); ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

</div>

