
<div class="container-fluid">

    <h2 class="h3 mb-4 text-gray-800">
        Laporan Penjualan Per Periode
    </h2>

    <div class="card shadow border-0 mb-4">

        <div class="card-header"
             style="background:#97B38C;color:white;">

            <h5 class="mb-0">
                Filter Periode
            </h5>

        </div>

        <div class="card-body">

            <form method="get">

                <div class="row">

                    <div class="col-md-4">

                        <label>
                            Tanggal Awal
                        </label>

                        <input type="date"
                               name="tanggal_awal"
                               value="<?= $tanggal_awal; ?>"
                               class="form-control">

                    </div>

                    <div class="col-md-4">

                        <label>
                            Tanggal Akhir
                        </label>

                        <input type="date"
                               name="tanggal_akhir"
                               value="<?= $tanggal_akhir; ?>"
                               class="form-control">

                    </div>

                    <div class="col-md-4">

                        <label>&nbsp;</label>

                        <div>

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fas fa-search"></i>
                                Filter

                            </button>

                            <a href="<?= site_url('laporan/periode'); ?>"
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

    <a href="<?= site_url('laporan/cetak_periode?tanggal_awal='.$tanggal_awal.'&tanggal_akhir='.$tanggal_akhir); ?>"
       target="_blank"
       class="btn btn-success mb-3">

        <i class="fas fa-print"></i>
        Cetak PDF

    </a>

    <div class="card shadow border-0">

        <div class="card-header"
             style="background:#97B38C;color:white;">

            <h5 class="mb-0">
                Data Penjualan
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover table-bordered">

                    <thead class="thead-light">

                        <tr>

                            <th>No</th>
                            <th>Kode Order</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Sales</th>
                            <th>Total Harga</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $no=1; ?>

                        <?php foreach($data as $d): ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td>
                                <?= $d->kode_order; ?>
                            </td>

                            <td>
                                <?= date('d-m-Y', strtotime($d->tanggal_order)); ?>
                            </td>

                            <td>
                                <?= $d->nama_pelanggan; ?>
                            </td>

                            <td>
                                <?= $d->nama_sales; ?>
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

                </table>

            </div>

        </div>

    </div>

</div>

