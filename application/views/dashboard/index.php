
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">
    Dashboard Sales Order System
</h1>

<?php $role = $this->session->userdata('role'); ?>

<?php if($role == 'admin'): ?>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card shadow h-100 py-2 border-0">

            <div class="card-body text-center">

                <i class="fas fa-box fa-3x mb-3"
                   style="color:#97B38C;"></i>

                <h6 class="text-muted">
                    Total Produk
                </h6>

                <h2>
                    <?= $total_produk; ?>
                </h2>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card shadow h-100 py-2 border-0">

            <div class="card-body text-center">

                <i class="fas fa-users fa-3x mb-3"
                   style="color:#97B38C;"></i>

                <h6 class="text-muted">
                    Total Pelanggan
                </h6>

                <h2>
                    <?= $total_pelanggan; ?>
                </h2>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card shadow h-100 py-2 border-0">

            <div class="card-body text-center">

                <i class="fas fa-user-tie fa-3x mb-3"
                   style="color:#97B38C;"></i>

                <h6 class="text-muted">
                    Total Sales
                </h6>

                <h2>
                    <?= $total_sales; ?>
                </h2>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card shadow h-100 py-2 border-0">

            <div class="card-body text-center">

                <i class="fas fa-shopping-cart fa-3x mb-3"
                   style="color:#97B38C;"></i>

                <h6 class="text-muted">
                    Total Order
                </h6>

                <h2>
                    <?= $total_order; ?>
                </h2>

            </div>

        </div>

    </div>

</div>

<?php elseif($role == 'sales'): ?>

<?php if(!$this->session->userdata('id_sales_aktif')): ?>

<?php if($this->session->flashdata('error')): ?>

<div class="alert alert-danger">
    <?= $this->session->flashdata('error'); ?>
</div>

<?php endif; ?>

<div class="card shadow border-0">

    <div class="card-header"
         style="background:#97B38C;color:white;">

        <h5 class="mb-0">
            Validasi Sales
        </h5>

    </div>

    <div class="card-body">

        <form method="post"
              action="<?= site_url('dashboard/validasi_sales'); ?>">

            <div class="form-group">

                <label>Nama Sales</label>

                <select name="id_sales"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih Sales --
                    </option>

                    <?php foreach($sales_list as $s): ?>

                    <option value="<?= $s->id_sales; ?>">
                        <?= $s->nama_sales; ?>
                    </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <div class="form-group">

                <label>ID Sales</label>

                <input type="text"
                       name="sales_id"
                       class="form-control"
                       placeholder="Contoh : SLS001"
                       required>

            </div>

            <button type="submit"
                    class="btn btn-primary">

                Validasi

            </button>

        </form>

    </div>

</div>

<?php else: ?>

<div class="alert alert-success">

    Login sebagai Sales :

    <strong>
        <?= $this->session->userdata('nama_sales_aktif'); ?>
    </strong>

    <a href="<?= site_url('dashboard/logout_sales'); ?>"
       class="btn btn-danger btn-sm float-right">

       Ganti Sales

    </a>

</div>

<div class="card shadow border-0">

    <div class="card-body text-center">

        <i class="fas fa-shopping-cart fa-4x mb-3"
           style="color:#97B38C;"></i>

        <h4>
            Sales Order
        </h4>

        <p class="text-muted">
            Kelola pesanan pelanggan Anda
        </p>

        <a href="<?= site_url('salesorder'); ?>"
           class="btn btn-primary">

           Masuk Sales Order

        </a>

    </div>

</div>

<?php endif; ?>

<?php elseif($role == 'manager'): ?>

<div class="row">

    <div class="col-md-6">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <i class="fas fa-shopping-cart fa-3x mb-3"
                   style="color:#97B38C;"></i>

                <h6 class="text-muted">
                    Total Order
                </h6>

                <h2>
                    <?= $total_order; ?>
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <i class="fas fa-box fa-3x mb-3"
                   style="color:#97B38C;"></i>

                <h6 class="text-muted">
                    Total Produk
                </h6>

                <h2>
                    <?= $total_produk; ?>
                </h2>

            </div>

        </div>

    </div>

</div>

<?php endif; ?>

</div>
