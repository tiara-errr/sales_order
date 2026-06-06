<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Pelanggan</h2>

<a href="<?= site_url('pelanggan/tambah'); ?>" class="btn btn-primary mb-3">Tambah</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

<table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Aksi</th>
    </tr>
</thead>

<tbody>
<?php $no=1; foreach($pelanggan as $p): ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $p->nama_pelanggan; ?></td>
    <td><?= $p->alamat; ?></td>
    <td><?= $p->telepon; ?></td>
    <td>
        <a href="<?= site_url('pelanggan/edit/'.$p->id_pelanggan); ?>" class="btn btn-warning btn-sm">
            Edit
        </a>

        <a href="<?= site_url('pelanggan/hapus/'.$p->id_pelanggan); ?>"
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