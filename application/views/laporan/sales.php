
<div class="container-fluid">

    <h2 class="h3 mb-4 text-gray-800">
        Laporan Penjualan Per Sales
    </h2>

    <div class="card shadow border-0 mb-4">

        <div class="card-header"
             style="background:#97B38C;color:white;">

            <h5 class="mb-0">
                Filter Sales
            </h5>

        </div>

        <div class="card-body">

            <form method="get">

                <div class="row">

                    <div class="col-md-5">

                        <label>
                            Pilih Sales
                        </label>

                        <select name="id_sales"
                                class="form-control">

                            <option value="">
                                -- Semua Sales --
                            </option>

                            <?php foreach($sales as $s): ?>

                            <option value="<?= $s->id_sales; ?>"
                                <?= ($id_sales == $s->id_sales) ? 'selected' : ''; ?>>

                                <?= $s->nama_sales; ?>

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

                            <a href="<?= site_url('laporan/sales'); ?>"
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

    <?php
    $total = 0;

    foreach($data as $d){
        $total += $d->total_harga;
    }
    ?>

    <div class="row mb-3">

        <div class="col-md-4">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <i class="fas fa-money-bill-wave fa-3x mb-2"
                       style="color:#97B38C;"></i>

                    <h6 class="text-muted">
                        Total Penjualan
                    </h6>

                    <h4>
                        Rp <?= number_format($total,0,',','.'); ?>
                    </h4>

                </div>

            </div>

        </div>

    </div>

    <a href="<?= site_url('laporan/cetak_sales?id_sales='.$id_sales); ?>"
       target="_blank"
       class="btn btn-success mb-3">

        <i class="fas fa-print"></i>
        Cetak PDF

    </a>

    <div class="card shadow border-0">

        <div class="card-header"
             style="background:#97B38C;color:white;">

            <h5 class="mb-0">
                Data Penjualan Sales
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover table-bordered">

                    <thead class="thead-light">

                        <tr>

                            <th>No</th>
                            <th>Sales</th>
                            <th>Kode Order</th>
                            <th>Pelanggan</th>
                            <th>Total Harga</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $no = 1;
                        ?>

                        <?php foreach($data as $d): ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td>
                                <?= $d->nama_sales; ?>
                            </td>

                            <td>
                                <?= $d->kode_order; ?>
                            </td>

                            <td>
                                <?= $d->nama_pelanggan; ?>
                            </td>

                            <td>
                                Rp <?= number_format($d->total_harga,0,',','.'); ?>
                            </td>

                            <td>

                                <?php if($d->status == 'draft'): ?>

                                    <span class="badge badge-secondary">
                                        Draft
                                    </span>

                                <?php elseif($d->status == 'dikirim'): ?>

                                    <span class="badge badge-info">
                                        Dikirim
                                    </span>

                                <?php elseif($d->status == 'selesai'): ?>

                                    <span class="badge badge-success">
                                        Selesai
                                    </span>

                                <?php elseif($d->status == 'dibatalkan'): ?>

                                    <span class="badge badge-danger">
                                        Dibatalkan
                                    </span>

                                <?php endif; ?>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                    <tfoot>

                        <tr>

                            <th colspan="4"
                                class="text-right">

                                Total Penjualan

                            </th>

                            <th colspan="2">

                                Rp <?= number_format($total,0,',','.'); ?>

                            </th>

                        </tr>

                    </tfoot>

                </table>

            </div>

        </div>

    </div>

</div>
