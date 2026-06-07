<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Edit Sales</h2>

<div class="card shadow">
    <div class="card-body">

<form method="post" action="<?= site_url('sales/update/'.$sales->id_sales); ?>">

    <div class="form-group">
        <label>ID Sales</label>
        <input type="text" name="sales_id" class="form-control"
               value="<?= $sales->sales_id; ?>" required>
    </div>

    <div class="form-group">
        <label>Nama Sales</label>
        <input type="text" name="nama_sales" class="form-control"
               value="<?= $sales->nama_sales; ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= site_url('sales'); ?>" class="btn btn-secondary">Kembali</a>

</form>

    </div>
</div>

</div>