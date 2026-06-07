
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Periode</title>

    <style>
        body{
            font-family: Arial;
        }

        h3{
            text-align:center;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table, th, td{
            border:1px solid black;
        }

        th, td{
            padding:8px;
            text-align:center;
        }
    </style>
</head>

<body>

<h3>LAPORAN PENJUALAN PER PERIODE</h3>

<p>
Periode :
<?= date('d-m-Y', strtotime($tanggal_awal)); ?>
s/d
<?= date('d-m-Y', strtotime($tanggal_akhir)); ?>
</p>

<table>

<tr>
    <th>No</th>
    <th>Kode Order</th>
    <th>Tanggal</th>
    <th>Pelanggan</th>
    <th>Sales</th>
    <th>Total Harga</th>
    <th>Status</th>
</tr>

<?php $no=1; foreach($data as $d): ?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $d->kode_order; ?></td>
    <td><?= date('d-m-Y', strtotime($d->tanggal_order)); ?></td>
    <td><?= $d->nama_pelanggan; ?></td>
    <td><?= $d->nama_sales; ?></td>
    <td>Rp <?= number_format($d->total_harga,0,',','.'); ?></td>
    <td><?= ucfirst($d->status); ?></td>
</tr>

<?php endforeach; ?>

</table>

<br><br>

<p style="text-align:right;">
    Tangerang, <?= date('d-m-Y'); ?><br><br><br><br><br>
    (Admin)
</p>

<script>
window.print();
</script>

</body>
</html>

