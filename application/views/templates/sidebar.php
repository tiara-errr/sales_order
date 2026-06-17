<ul class="navbar-nav sidebar sidebar-dark accordion"
    id="accordionsidebar"
    style="background:#97B38C;">

<a class="sidebar-brand d-flex align-items-center"
   href="<?= site_url('dashboard') ?>">

    <div class="sidebar-brand-icon">
        <i class="fas fa-box-open"></i>
    </div>

    <div class="sidebar-brand-text mx-2">
        PT Maju Jaya
    </div>

</a>

<hr class="sidebar-divider my-0">

<?php $role = $this->session->userdata('role'); ?>

<li class="nav-item">
    <a class="nav-link"
       href="<?= site_url('dashboard') ?>">

        <i class="fas fa-tachometer-alt"></i>
        <span>Dashboard</span>

    </a>
</li>

<hr class="sidebar-divider">

<?php if($role == 'admin'): ?>

<li class="nav-item">
    <a class="nav-link"
       href="<?= site_url('produk') ?>">

        <i class="fas fa-box"></i>
        <span>Data Produk</span>

    </a>
</li>

<li class="nav-item">
    <a class="nav-link"
       href="<?= site_url('pelanggan') ?>">

        <i class="fas fa-users"></i>
        <span>Data Pelanggan</span>

    </a>
</li>

<li class="nav-item">
    <a class="nav-link"
       href="<?= site_url('sales') ?>">

        <i class="fas fa-user-tie"></i>
        <span>Data Sales</span>

    </a>
</li>

<li class="nav-item">
    <a class="nav-link"
       href="<?= site_url('salesorder') ?>">

        <i class="fas fa-shopping-cart"></i>
        <span>Sales Order</span>

    </a>
</li>

<?php endif; ?>

<?php if($role == 'sales'): ?>

<li class="nav-item">
    <a class="nav-link"
       href="<?= site_url('salesorder') ?>">

        <i class="fas fa-shopping-cart"></i>
        <span>Sales Order Saya</span>

    </a>
</li>

<?php endif; ?>

<?php if($role == 'manager'): ?>

<li class="nav-item">
    <a class="nav-link"
       href="<?= site_url('laporan/produk') ?>">

        <i class="fas fa-chart-bar"></i>
        <span>Laporan Produk</span>

    </a>
</li>

<li class="nav-item">
    <a class="nav-link"
       href="<?= site_url('laporan/sales') ?>">

        <i class="fas fa-chart-line"></i>
        <span>Laporan Sales</span>

    </a>
</li>

<li class="nav-item">
    <a class="nav-link"
       href="<?= site_url('laporan/periode') ?>">

        <i class="fas fa-calendar-alt"></i>
        <span>Laporan Periode</span>

    </a>
</li>

<?php endif; ?>

<hr class="sidebar-divider">

<div class="text-center text-white small mb-3">
    Sales Order System
</div>

</ul>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">