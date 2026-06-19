
<div class="container-fluid">

    <h2 class="h3 mb-4 text-gray-800">
        Edit Status Order
    </h2>

    <div class="card shadow border-0">

        <div class="card-header"
             style="background:#97B38C;color:white;">

            <h5 class="mb-0">
                Update Status Sales Order
            </h5>

        </div>

        <div class="card-body">

            <form method="post"
                  action="<?= site_url('salesorder/update_status/'.$order->id_order); ?>">

                <div class="form-group">

                    <label>
                        Status Order
                    </label>

                    <select name="status"
                            class="form-control">

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

                <hr>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="fas fa-save"></i>
                    Simpan

                </button>

                <a href="<?= site_url('salesorder'); ?>"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>
