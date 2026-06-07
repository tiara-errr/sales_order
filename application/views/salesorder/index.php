<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Sales Order</h2>

<a href="<?= site_url('salesorder/tambah'); ?>" class="btn btn-primary mb-3">
    Tambah
</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

<table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">

    <thead>
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
            Rp <?= number_format($d->harga, 0, ',', '.'); ?>
        </td>

        <td><?= $d->qty; ?></td>

        <td>
            Rp <?= number_format($d->total_harga, 0, ',', '.'); ?>
        </td>

        <td><?= ucfirst($d->status); ?></td>

        <td>
    <a href="<?= site_url('salesorder/edit_status/'.$d->id_order); ?>"
       class="btn btn-warning btn-sm">
       Status
    </a>

    <a href="<?= site_url('salesorder/cetak/'.$d->id_order); ?>"
       target="_blank"
       class="btn btn-success btn-sm">
       Cetak
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