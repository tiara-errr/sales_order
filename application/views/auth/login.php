<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sales Order System - Login</title>

    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css');?>"
          rel="stylesheet"
          type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
          rel="stylesheet">

    <link href="<?= base_url('assets/css/sb-admin-2.min.css');?>"
          rel="stylesheet">

</head>

<body style="background:#E8F0E8;">

<div class="container">

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">

                <div class="card-body p-0">

                    <div class="row">

                        <!-- BAGIAN KIRI -->
                        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center"
                             style="background:#DDE5D5;">

                            <div class="text-center">

                                <i class="fas fa-box-open"
                                   style="
                                   font-size:120px;
                                   color:#97B38C;
                                   ">
                                </i>

                                <h2 class="mt-4 text-dark font-weight-bold">
                                    Sales Order
                                </h2>

                                <p class="text-muted">
                                    PT Maju Jaya
                                </p>

                            </div>

                        </div>

                        <!-- BAGIAN KANAN -->
                        <div class="col-lg-6">

                            <div class="p-5">

                                <div class="text-center">

                                    <h1 class="h3 text-gray-900 mb-2">
                                        Login
                                    </h1>

                                    <p class="text-muted mb-4">
                                        Silakan masuk ke sistem
                                    </p>

                                </div>

                                <?php if ($this->session->flashdata('error')): ?>

                                <div class="alert alert-danger">
                                    <?= $this->session->flashdata('error'); ?>
                                </div>

                                <?php endif; ?>

                                <form class="user"
                                      method="post"
                                      action="<?= site_url('login/proses');?>">

                                    <div class="form-group">

                                        <input type="text"
                                               name="username"
                                               class="form-control form-control-user"
                                               placeholder="Username"
                                               required>

                                    </div>

                                    <div class="form-group">

                                        <input type="password"
                                               name="password"
                                               class="form-control form-control-user"
                                               placeholder="Password"
                                               required>

                                    </div>

                                    <button type="submit"
                                            class="btn btn-user btn-block"
                                            style="
                                            background:#97B38C;
                                            color:white;
                                            border:none;
                                            ">

                                        Login

                                    </button>

                                </form>

                            </div>

                        </div>
                        <!-- END KANAN -->

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>

<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

<script src="<?= base_url('assets/js/sb-admin-2.min.js');?>"></script>

</body>

</html>