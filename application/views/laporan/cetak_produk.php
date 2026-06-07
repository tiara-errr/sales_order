
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Produk</title>

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

        @media print{
            button{
                display:none;
            }
        }
    </style>
</head>

<body>

<h3>LAPORAN DATA PRODUK</h3>

<table>

<tr>
    <th>No</th>
    <th>Kode Produk</th>
    <th>Nama Produk</th>
    <th>Harga</th>
    <th>Stok</th>
</tr>

<?php $no=1; foreach($data as $d): ?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $d->kode; ?></td>
    <td><?= $d->nama_produk; ?></td>
    <td>Rp <?= number_format($d->harga,0,',','.'); ?></td>
    <td><?= $d->stok; ?></td>
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