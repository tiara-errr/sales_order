
<div class="container-fluid">

    <h3>Laporan Penjualan Per Sales</h3>

    <form method="get">

        <div class="row">

            <div class="col-md-4">

                <label>Pilih Sales</label>

                <select name="id_sales" class="form-control">

                    <option value="">-- Semua Sales --</option>

                    <?php foreach($sales as $s): ?>

                    <option value="<?= $s->id_sales; ?>"
                        <?= ($id_sales == $s->id_sales) ? 'selected' : ''; ?>>

                        <?= $s->nama_sales; ?>

                    </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <div class="col-md-4 mt-4">

                <button type="submit"
                        class="btn btn-primary btn-sm">
                    Filter
                </button>

                <a href="<?= site_url('laporan/sales'); ?>"
                   class="btn btn-secondary btn-sm">
                    Reset
                </a>

            </div>

        </div>

    </form>

    <br>

    <a href="<?= site_url('laporan/cetak_sales?id_sales='.$id_sales); ?>"
       target="_blank"
       class="btn btn-success btn-sm">
       Cetak PDF
    </a>

    <table class="table table-bordered mt-3">

        <tr>
            <th>No</th>
            <th>Sales</th>
            <th>Kode Order</th>
            <th>Pelanggan</th>
            <th>Total Harga</th>
            <th>Status</th>
        </tr>

        <?php
        $no = 1;
        $total = 0;

        foreach($data as $d):

            $total += $d->total_harga;
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d->nama_sales; ?></td>
            <td><?= $d->kode_order; ?></td>
            <td><?= $d->nama_pelanggan; ?></td>
            <td>
                Rp <?= number_format($d->total_harga,0,',','.'); ?>
            </td>
            <td><?= ucfirst($d->status); ?></td>
        </tr>

        <?php endforeach; ?>

        <tr>
            <th colspan="4" style="text-align:right">
                Total Penjualan
            </th>

            <th colspan="2">
                Rp <?= number_format($total,0,',','.'); ?>
            </th>
        </tr>

    </table>

</div>
