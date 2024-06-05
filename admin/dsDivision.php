<?php
    include ('config/dbcon.php');

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
              <li class="breadcrumb-item active">Registered Offenders Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if(isset($_SESSION['status'])){
                            echo "<h4>".$_SESSION['status']."</h4>";
                            unset($_SESSION['status']);
                        }
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DS Division</h3>
                            <a href="index.php"  class="btn btn-danger float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example5" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>DS Division</th>
                                        <th>Male</th>
                                        <th>Female</th>
                                        <th>Total</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $cr_details_query = "SELECT * FROM ds_division";
                                        $cr_details_query_run = mysqli_query($con, $cr_details_query);

                                        if(mysqli_num_rows($cr_details_query_run) > 0){
                                            foreach($cr_details_query_run as $row){
                                                //echo $row['name'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['name'];?></td>
                                                    <td><?php echo $row['male'];?></td>
                                                    <td><?php echo $row['female'];?></td>
                                                    <td><?php echo $row['total_count'];?></td>
                                                    <td>
                                                        <a href="viewDetails.php?nic=<?php echo $row['ds_id']; ?>" class="btn btn-info viewBtn">View</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else{
                                            ?>
                                            <tr>
                                                <td>No record found</td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!--Body Part End-->
<?php include ('includes/scripts.php');?>
<?php include ('includes/footer.php');?>