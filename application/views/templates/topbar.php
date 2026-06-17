<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow"
     style="background:#F8F6F0;">

    <button id="SidebarToggleTop"
            class="btn btn-link d-md-none rounded-circle mr-3">

        <i class="fa fa-bars"></i>

    </button>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle"
               href="#"
               id="userDropdown"
               role="button"
               data-toggle="dropdown"
               aria-haspopup="true"
               aria-expanded="false">

                <span class="mr-3 d-none d-lg-inline text-gray-700 small">

                    <?= ucfirst($this->session->userdata('role')); ?>

                </span>

                <img class="img-profile rounded-circle"
                     src="<?= base_url('assets/img/undraw_profile.svg')?>"
                     width="40">

            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown">

                <div class="dropdown-header">

                    PT Maju Jaya

                </div>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item"
                   href="<?= site_url('auth/logout')?>">

                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                    Logout

                </a>

            </div>

        </li>

    </ul>

</nav>