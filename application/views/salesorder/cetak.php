<!DOCTYPE html>
<html>
<head>
    <title>''</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            margin:40px;
            color:#000;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        .info{
            width:100%;
            margin-bottom:20px;
        }

        .info td{
            padding:5px;
        }

        .detail{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
        }

        .detail th,
        .detail td{
            border:1px solid #000;
            padding:8px;
        }

        .detail th{
            text-align:center;
        }

        .kanan{
            text-align:right;
        }

        .total{
            margin-top:15px;
            text-align:right;
            font-size:18px;
            font-weight:bold;
        }

        .ttd{
            width:100%;
            margin-top:70px;
        }

        .ttd td{
            width:50%;
            text-align:center;
        }
    </style>
</head>

<body onload="window.print()">

<h2>SALES ORDER</h2>

<table class="info">
    <tr>
        <td width="150">Kode Order</td>
        <td>: <?= $order->kode_order; ?></td>
    </tr>

    <tr>
        <td>Tanggal</td>
        <td>: <?= date('d-m-Y', strtotime($order->tanggal_order)); ?></td>
    </tr>

    <tr>
        <td>Status</td>
        <td>: <?= ucfirst($order->status); ?></td>
    </tr>

    <tr>
        <td>Pelanggan</td>
        <td>: <?= $order->nama_pelanggan; ?></td>
    </tr>

    <tr>
        <td>Sales</td>
        <td>: <?= $order->nama_sales; ?></td>
    </tr>
</table>

<table class="detail">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td><?= $order->nama_produk; ?></td>

            <td class="kanan">
                Rp <?= number_format($order->harga,0,',','.'); ?>
            </td>

            <td align="center">
                <?= $order->qty; ?>
            </td>

            <td class="kanan">
                Rp <?= number_format($order->subtotal,0,',','.'); ?>
            </td>
        </tr>
    </tbody>
</table>

<div class="total">
    TOTAL HARGA :
    Rp <?= number_format($order->total_harga,0,',','.'); ?>
</div>

<table class="ttd">
    <tr>
        <td>
            Sales
            <br><br><br><br><br>
            ( <?= $order->nama_sales; ?> )
        </td>

        <td>
            Manager
            <br><br><br><br><br>
            ( ____________________ )
        </td>
    </tr>
</table>

</body>
</html>
