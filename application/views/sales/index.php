<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Sales</h2>

<a href="<?= site_url('sales/tambah'); ?>" class="btn btn-primary mb-3">Tambah</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

<table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
    <thead>
    <tr>
        <th>No</th>
        <th>ID Sales</th>
        <th>Nama Sales</th>
        <th>Aksi</th>
    </tr>
</thead>

<tbody>
<?php $no=1; foreach($sales as $s): ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $s->sales_id; ?></td>
    <td><?= $s->nama_sales; ?></td>

    <td>
        <a href="<?= site_url('sales/edit/'.$s->id_sales); ?>" class="btn btn-warning btn-sm">
            Edit
        </a>

        <a href="<?= site_url('sales/hapus/'.$s->id_sales); ?>"
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