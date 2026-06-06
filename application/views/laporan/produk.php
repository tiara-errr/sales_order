<div class="container-fluid">
    <h3> Laporan Data Buku </h3>

    <form method="get">

        <select name="id_kategori" class="form-control mb-2">

            <option value="">-- Semua Kategori --</option>

            <?php foreach($kategori as $k): ?>

            <option value="<?= $k->id; ?>"
            <?= ($id_kategori == $k->id) ? 'selected' : ''; ?>>

                <?= $k->nama_kategori; ?>

            </option>

            <?php endforeach; ?>

        </select>

        <button type="submit" class="btn btn-primary btn-sm">
            Filter
        </button>

        <a href="<?= site_url('laporan/buku');?>"
        class="btn btn-secondary btn-sm">
        Reset
        </a>

    </form>

    <br>
    
    <a href="<?= site_url('buku/cetak_buku?id_kategori='.$id_kategori);?>"
    target="_blank" class="btn btn-success btn-sm">
    Cetak PDF
    </a>

    <table class="table table-bordered mt-3">

    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Stok</th>
    </tr>

    <?php $no=1; foreach($data as $d): ?>

    <tr>
        <td><?= $no++; ?></td>
        <td><?= $d->kode_buku; ?></td>
        <td><?= $d->judul_buku; ?></td>
        <td><?= $d->nama_kategori; ?></td>
        <td><?= $d->stok; ?></td>
    </tr>

    <?php endforeach;?>

    </table>
</div>