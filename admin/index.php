<?php
    include ('includes/header.php');
    include ('includes/topbar.php');
    include ('includes/sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="padding-left: 25px; padding-right: 25px;">
        <!-- Small boxes (Stat box) -->
        <div class="col-md-12">
          <?= alertMessage()?>
        </div>
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $offenders_query = "SELECT * FROM cr_details";
                  $offenders_query_run = mysqli_query($con, $offenders_query);
                  if ($offenders_total = mysqli_num_rows($offenders_query_run))
                  {
                    echo '<h3>'. $offenders_total .'</h3>';
                  }else
                  {
                    echo "<h4>No Data</h4>";
                  }
                ?>
                <p>Total Offense Records</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="offenders_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                  $recent_offense_query = "SELECT *
                  FROM cr_details
                  WHERE offence_date >= DATE_SUB(NOW(), INTERVAL 2 MONTH)";

                  $recent_offense_query_run = mysqli_query($con, $recent_offense_query);
                  if ($recent_offense_total = mysqli_num_rows($recent_offense_query_run))
                  {
                    echo '<h3>'. $recent_offense_total .'</h3>';
                  }else
                  {
                    echo "<h3>No Data</h3>";
                  }
                ?>

                <p>Recent Offense Records</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="recent_offense.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
                  $category_query = "SELECT * FROM offense_category";
                  $category_query_run = mysqli_query($con, $category_query);
                  if ($category_total = mysqli_num_rows($category_query_run))
                  {
                    echo '<h3>'. $category_total .'</h3>';
                  }else
                  {
                    echo "<h3>No Data</h3>";
                  }
                ?>
                <p>Categories of Offense</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="category.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row 1-->
        <!-- row 2-->
        <div class="row">
          <div class="col-lg-4 col-6" >
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $male_offenders_query =
                  "SELECT * FROM cr_details WHERE gender = 'Male' ";
                  $male_offenders_query_run = mysqli_query($con, $male_offenders_query);
                  if ($male_offenders_total = mysqli_num_rows($male_offenders_query_run))
                  {
                    echo '<h3>'. $male_offenders_total .'</h3>';
                  }else
                  {
                    echo "<h3>No Data</h3>";
                  }
                ?>
                <p>Male</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="male.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                  $female_offenders_query = "SELECT * FROM cr_details WHERE gender = 'Female' ";

                  $female_offenders_query_run = mysqli_query($con, $female_offenders_query);
                  if ($female_offenders_total = mysqli_num_rows($female_offenders_query_run))
                  {
                    echo '<h3>'. $female_offenders_total .'</h3>';
                  }else
                  {
                    echo "<h3>No Data</h3>";
                  }
                ?>

                <p>Female</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="female.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-4 col-6" >
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
                  $category_query = "SELECT * FROM offense_category";
                  $category_query_run = mysqli_query($con, $category_query);
                  if ($category_total = mysqli_num_rows($category_query_run))
                  {
                    echo '<h3>'. $category_total .'</h3>';
                  }else
                  {
                    echo "<h3>No Data</h3>";
                  }
                ?>
                <p>Categories of Offense</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="category.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row 1-->

        </div><!-- /.container-fluid -->
    </section>
  </div>

<?php include ('includes/scripts.php');?>
<?php include ('includes/footer.php');?>