<?php 

    include ('includes/header.php');
    include ('includes/topbar.php');
    include ('includes/sidebar.php');
    // include ('config/dbcon.php');
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
              <li class="breadcrumb-item active">Offender Details</li>
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
                            <h3 class="card-title">View Offenders Details</h3>
                            <a href="recent_offense.php"  class="btn btn-danger float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example4" class="table table-bordered table-striped">
                                <?php
                                    if(isset($_GET['nic'])){
                                        $cr_nic = $_GET['nic'];

                                        $cr_details_query = "SELECT cr_details.*, offense.odate AS odate, offense.odescription AS odescription
                                                            FROM cr_details
                                                            INNER JOIN  offence_table ON cr_details.nic= offence_table.nic
                                                            INNER JOIN offense ON offense.off_id= offence_table.off_id WHERE cr_details.nic = '$cr_nic' LIMIT 1";
                                        $cr_details_query_run = mysqli_query($con, $cr_details_query);

                                        if(mysqli_num_rows($cr_details_query_run) > 0)
                                        {
                                            foreach($cr_details_query_run as $row)
                                            {
                                                //echo $row['name'];
                                                ?>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td><?php echo $row['name'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Photo</th>
                                                        <td><img src="uploads/offenders/<?php echo $row['photo'];?>" width="150px" height="150px"/></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Register No</th>
                                                        <td><?php echo $row['register_number'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Case No</th>
                                                        <td><?php echo $row['case_no'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Full Name</th>
                                                        <td><?php echo $row['full_name'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>NIC Number</th>
                                                        <td><?php echo $row['nic'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Date of Birth</th>
                                                        <td><?php echo $row['dob'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Age</th>
                                                        <td><?php echo $row['age'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Gender</th>
                                                        <td><?php echo $row['gender'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Civil Status</th>
                                                        <td><?php echo $row['civil_status'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Parents Name</th>
                                                        <td><?php echo $row['parents_name'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Children Details</th>
                                                        <td><?php echo $row['children_details'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Permanent Address</th>
                                                        <td><?php echo $row['permanent_address'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>DS Division</th>
                                                        <td><?php echo $row['ds_division'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>GS Division</th>
                                                        <td><?php echo $row['gs_division'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Race</th>
                                                        <td><?php echo $row['race'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Religion</th>
                                                        <td><?php echo $row['religion'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Nationality</th>
                                                        <td><?php echo $row['nationality'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Phone Number</th>
                                                        <td><?php echo $row['phone_num'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Employment</th>
                                                        <td><?php echo $row['employment'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Education</th>
                                                        <td><?php echo $row['education'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Recent Offense</th>
                                                        <td><?php echo $row['recent_offence'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Offense Date</th>
                                                        <td><?php echo $row['offence_date'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>All Offense</th>
                                                        <td>
                                                            <!-- /.row -->
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card">
                                                                        <!-- /.card-header -->
                                                                        <div class="card-body table-responsive p-0" style="height: 196px;">
                                                                            <table class="table table-head-fixed text-nowrap">
                                                                                <thead>                                                                            <tr>                                                                               <th>Date</th>                                                                     <th>Reason</th>                                                                 </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php
                                                                                    $offense_details_query = "SELECT offense.odate AS odate, offense.odescription AS odescription
                                                                                                        FROM cr_details
                                                                                                        INNER JOIN offence_table ON cr_details.nic=offence_table.nic
                                                                                                        INNER JOIN offense ON offense.off_id=offence_table.off_id
                                                                                                        WHERE cr_details.nic = '$cr_nic'";
                                                                                    $offense_details_query_run = mysqli_query($con, $offense_details_query);

                                                                                    if(mysqli_num_rows($offense_details_query_run) > 0)
                                                                                    {
                                                                                        foreach($offense_details_query_run as $offense_row) {
                                                                                            //echo $row['name'];
                                                                                        ?>
                                                                                                <tr>
                                                                                                    <td><?php echo $offense_row['odate'];?></td>
                                                                                                    <td><?php echo $offense_row['odescription'];?></td>
                                                                                                </tr>
                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    ?>
                                                                                            <tr>
                                                                                                <td>Not found</td>
                                                                                            </tr>
                                                                                        <?php
                                                                                    }
                                                                                ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <!-- /.card-body -->
                                                                    </div>
                                                                    <!-- /.card -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Order</th>
                                                        <td><?php echo $row['order_id'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Next Date</th>
                                                        <td><?php echo $row['next_date'];?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Completed</th>
                                                        <td>
                                                            <!-- /.row -->
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card">
                                                                        <!-- /.card-header -->
                                                                        <div class="card-body table-responsive p-0" style="height: 98px;">
                                                                        
                                                                                <table class="table table-head-fixed text-nowrap">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Status</th>
                                                                                            <th>Date</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <?php
                                                                                            $offense_details_query = "SELECT offense.odate AS odate, offense.odescription AS odescription
                                                                                                                FROM cr_details
                                                                                                                INNER JOIN offence_table ON cr_details.nic=offence_table.nic
                                                                                                                INNER JOIN offense ON offense.off_id=offence_table.off_id";
                                                                                            $offense_details_query_run = mysqli_query($con, $cr_details_query);

                                                                                            if(mysqli_num_rows($offense_details_query_run) > 0)
                                                                                            {
                                                                                                foreach($offense_details_query_run as $offense_row) {
                                                                                                    //echo $row['name'];
                                                                                                    ?>
                                                                                                        <tr>
                                                                                                            <td><?php echo $offense_row['status'] == true ? 'Yes' : 'No';?></td>
                                                                                                            <td><?php echo $offense_row['completed_date'];?></td>
                                                                                                        </tr>
                                                                                                        <?php
                                                                                                }
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                                    ?>
                                                                                                        <tr>
                                                                                                            <td>Not found</td>
                                                                                                        </tr>
                                                                                                    <?php
                                                                                            }
                                                                                        }
                                                                                    ?>
                                                                                    </tbody>
                                                                                </table>
                                                                               
                                                                        </div>
                                                                        <!-- /.card-body -->
                                                                    </div>
                                                                    <!-- /.card -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td>Not found</td>
                                                </tr>
                                            <?php
                                        }
                                ?>
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