<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Tambah Sales Order</h2>

<div class="card shadow">
    <div class="card-body">

<form method="post" action="<?= site_url('salesorder/simpan'); ?>">

    <div class="form-group">
        <label>Pelanggan</label>
        <select name="id_pelanggan" class="form-control" required>
            <option value="">-- Pilih Pelanggan --</option>
            <?php foreach($pelanggan as $p): ?>
                <option value="<?= $p->id_pelanggan; ?>">
                    <?= $p->nama_pelanggan; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Sales</label>
        <select name="id_sales" class="form-control" required>
            <option value="">-- Pilih Sales --</option>
            <?php foreach($sales as $s): ?>
                <option value="<?= $s->id_sales; ?>">
                    <?= $s->sales_id; ?> - <?= $s->nama_sales; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Produk</label>
        <select name="id_produk" class="form-control" required>
            <option value="">-- Pilih Produk --</option>
            <?php foreach($produk as $p): ?>
                <option value="<?= $p->id_produk; ?>">
                    <?= $p->nama_produk; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Qty</label>
        <input type="number" name="qty" class="form-control" min="1" required>
    </div>

    <div class="form-group">
        <label>Tanggal Order</label>
        <input type="date" name="tanggal_order" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="draft">Draft</option>
            <option value="dikirim">Dikirim</option>
            <option value="selesai">Selesai</option>
            <option value="dibatalkan">Dibatalkan</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= site_url('salesorder'); ?>" class="btn btn-secondary">Kembali</a>

</form>

    </div>
</div>

</div>