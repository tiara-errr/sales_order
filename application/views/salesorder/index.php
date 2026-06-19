
<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">
    Data Sales Order
</h2>

<?php if($this->session->userdata('role') == 'sales'): ?>

<a href="<?= site_url('salesorder/tambah'); ?>"
   class="btn btn-primary mb-3">

    <i class="fas fa-plus"></i>
    Tambah Order

</a>

<?php endif; ?>

<div class="card shadow border-0">

    <div class="card-header"
         style="background:#97B38C;color:white;">

        <h5 class="mb-0">
            Data Sales Order
        </h5>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover table-bordered"
                   width="100%"
                   id="dataTable">

                <thead class="thead-light">

                    <tr>
                        <th>No</th>
                        <th>Kode Order</th>
                        <th>Pelanggan</th>
                        <th>Sales</th>
                        <th>Produk</th>
                        <th>Harga Satuan</th>
                        <th>Qty</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                <?php $no = 1; foreach($data as $d): ?>

                <tr>

                    <td><?= $no++; ?></td>

                    <td><?= $d->kode_order; ?></td>

                    <td><?= $d->nama_pelanggan; ?></td>

                    <td><?= $d->nama_sales; ?></td>

                    <td><?= $d->nama_produk; ?></td>

                    <td>
                        Rp <?= number_format($d->harga,0,',','.'); ?>
                    </td>

                    <td><?= $d->qty; ?></td>

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

                    <td>

                        <?php if($this->session->userdata('role') == 'sales'): ?>

                        <a href="<?= site_url('salesorder/edit_status/'.$d->id_order); ?>"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <?php endif; ?>

                        <a href="<?= site_url('salesorder/cetak/'.$d->id_order); ?>"
                           target="_blank"
                           class="btn btn-success btn-sm">

                            <i class="fas fa-print"></i>

                        </a>

                    </td>

                </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</div>
