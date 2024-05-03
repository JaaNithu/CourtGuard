<?php 
$pageTitle = "Home";
include ('includes/header.php');
?>

<div class="py-5 " style="margin-bottom: 60px;">
        <div class="container ">
                <?= alertMessage()?>
                <div class="row justify-content-center" style="padding-top: 60px;">
                        <div class="col-sm-3">
                                <div class="card text-bg-success shadow">
                                        <div class="card-body">
                                                <h5 class="card-title">Total Offense Records</h5>
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
                                                <a href="offenders_list.php" class="card-link" style="color: white">More info</a>
                                        </div>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="card text-bg-warning shadow">
                                        <div class="card-body">
                                                <h5 class="card-title">Recent Offense Records</h5>
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
                                                <a href="user_recent_offense.php" class="card-link" style="color: black">More info</a>
                                        </div>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="card text-bg-success shadow">
                                        <div class="card-body">
                                                <h5 class="card-title">Categories of Offense</h5>
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
                                                <a href="category.php" class="card-link" style="color: white">More info</a>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="row justify-content-center" style="padding-top: 60px;">
                        <div class="col-sm-3">
                                <div class="card text-bg-success shadow">
                                        <div class="card-body">
                                                <h5 class="card-title">Male</h5>
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
                                                <a href="male.php" class="card-link" style="color: white">More info</a>
                                        </div>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="card text-bg-warning shadow">
                                        <div class="card-body">
                                                <h5 class="card-title">Female</h5>
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
                                                <a href="female.php" class="card-link" style="color: black">More info</a>
                                        </div>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="card text-bg-success shadow">
                                        <div class="card-body">
                                                <h5 class="card-title">Last Month</h5>
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
                                                <a href="#" class="card-link" style="color: white">More info</a>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>

<?php include ('includes/footer.php');?>