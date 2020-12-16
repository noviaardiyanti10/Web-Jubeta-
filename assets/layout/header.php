<nav>
        <ul class="nav justify-content-left navadmin fixed-top">
            <li class="nav-item  mt-2">
              <a class="nav-link active  text-white" href="../admin/dasboard-admin.php"><i class="fa fa-home d-inline-block align-top mt-1 mr-2 fa-lg"></i>HOME</a>
            </li>
            <li class="nav-item  mt-2">
              <a class="nav-link  text-white" href="../admin/order.php"><i class="fa fa-shopping-basket d-inline-block align-top mt-1 mr-2"></i>ORDER</a>
            </li>
            <li class="nav-item dropdown  mt-2">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                MENU
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../admin/produk-list.php">Produk</a>
                <a class="dropdown-item" href="../admin/entry-produk.php">New Produk</a>
                <a class="dropdown-item" href="../admin/user-list.php">List User</a>
                <a class="dropdown-item" href="../admin/daftar-admin.php">Daftar Admin</a>
                <div class="dropdown-divider"></div>
              </div>
              
            </li>
            <li class="nav-item  mt-2">
            <?php if ($_SESSION) : ?>
                <a class="nav-link js-scroll-trigger text-white" href="../logout.php">Logout</a>
              <?php else : ?>
                <a class="nav-link js-scroll-trigger text-white" href="../login.php">Login</a>
              <?php endif ?>
            </li>

            <a class="navbar-brand ml-auto  mt-2" href="#" >
              <li >
                <?php if ($_SESSION) : ?>
                      <a class="nav-link js-scroll-trigger text-white" href="#">Selamat Datang, <?php echo $username; ?></a>
                  <?php endif ?>
                </li>
            </a>
          </ul>
    </nav>