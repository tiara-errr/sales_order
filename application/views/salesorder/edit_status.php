
<div class="container-fluid">

<h2>Edit Status Order</h2>

<form method="post"
      action="<?= site_url('salesorder/update_status/'.$order->id_order); ?>">

    <div class="form-group">

        <label>Status</label>

        <select name="status" class="form-control">

            <option value="draft"
                <?= $order->status=='draft' ? 'selected' : ''; ?>>
                Draft
            </option>

            <option value="dikirim"
                <?= $order->status=='dikirim' ? 'selected' : ''; ?>>
                Dikirim
            </option>

            <option value="selesai"
                <?= $order->status=='selesai' ? 'selected' : ''; ?>>
                Selesai
            </option>

            <option value="dibatalkan"
                <?= $order->status=='dibatalkan' ? 'selected' : ''; ?>>
                Dibatalkan
            </option>

        </select>

    </div>

    <button type="submit" class="btn btn-primary">
        Simpan
    </button>

    <a href="<?= site_url('salesorder'); ?>"
       class="btn btn-secondary">
       Kembali
    </a>

</form>

</div>

