
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"  >
            <?php
              if(isset($_SESSION['auth']))
              {
                echo $_SESSION['auth_user']['email'];
              }
              else
              {
                echo "Not logged In";
              }
            ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a href="#" class="dropdown-item"></a>
            <a href="#" class="dropdown-item"></a>
            <form action="logout.php" method="POST">
              <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
            </form>
          </div>
        </div>
      </li>
      <!-- Navbar Search -->
      <li class="nav-item">
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
  </nav>
  <!-- /.navbar -->