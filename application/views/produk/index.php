<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Produk</h2>

<a href="<?= site_url('produk/tambah'); ?>" class="btn btn-primary mb-3">Tambah</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

<table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">

    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kode</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

<?php $no=1; foreach($produk as $p): ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $p->nama_produk; ?></td>
    <td><?= $p->kode; ?></td>
    <td>Rp<?= number_format($p->harga, 0, ',', '.'); ?></td>
    <td><?= $p->stok; ?></td>

    <td>
        <a href="<?= site_url('produk/edit/'.$p->id_produk); ?>" class="btn btn-warning btn-sm">
            Edit
        </a>

        <a href="<?= site_url('produk/hapus/'.$p->id_produk); ?>"
           onclick="return confirm('Yakin?')"
           class="btn btn-danger btn-sm">
           Hapus
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