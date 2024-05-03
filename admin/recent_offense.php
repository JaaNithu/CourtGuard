<?php 
    include ('includes/header.php');
    include ('includes/topbar.php');
    include ('includes/sidebar.php');
    include ('config/dbcon.php');
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
              <li class="breadcrumb-item active">Recent Offense Details</li>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>NIC</th>
                                        <th>Register No</th>
                                        <th>Case No</th>
                                        <th>Full Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $cr_details_query = "SELECT *
                                        FROM cr_details
                                        WHERE offence_date >= DATE_SUB(NOW(), INTERVAL 2 MONTH)";
                                        $cr_details_query_run = mysqli_query($con, $cr_details_query);

                                        if(mysqli_num_rows($cr_details_query_run) > 0){
                                            foreach($cr_details_query_run as $row){
                                                //echo $row['name'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['name'];?></td>
                                                    <td><img src="uploads/offenders/<?php echo $row['photo'];?>" width="50px" height="50px"/></td>
                                                    <td><?php echo $row['nic'];?></td>
                                                    <td><?php echo $row['register_number'];?></td>
                                                    <td><?php echo $row['case_no'];?></td>
                                                    <td><?php echo $row['full_name'];?></td>
                                                    <td>
                                                        <a href="view_recent_offense.php?nic=<?php echo $row['nic']; ?>" class="btn btn-info viewBtn">View</a>
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
<?php include ('includes/scripts.php');?>

<?php include ('includes/footer.php');?>