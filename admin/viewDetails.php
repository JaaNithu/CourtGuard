<?php 

    include ('includes/header.php');
    include ('includes/topbar.php');
    include ('includes/sidebar.php');
    // include ('config/dbcon.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Modal -->
    <div class="modal fade" id="AddOffenceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Add New Offenders Details</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="details.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" class="form-control-file" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Register Number</label>
                            <input type="text" name="register_number" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Case No</label>
                            <input type="text" name="case_no" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" name="full_name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">NIC Number</label>
                            <input type="text" name="nic" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Age</label>
                            <input type="text" name="age" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <input type="text" name="gender" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Civil Status</label>
                            <input type="text" name="civil_status" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Parents Name</label>
                            <input type="text" name="parents_name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Children Details</label>
                            <input type="text" name="children_details" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Permanent Address</label>
                            <input type="text" name="permanent_address" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">DS Division</label>
                            <input type="text" name="ds_division" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">GS Division</label>
                            <input type="text" name="gs_division" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Race</label>
                            <input type="text" name="race" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Religion</label>
                            <input type="text" name="religion" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Nationality</label>
                            <input type="text" name="nationality" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone_num" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Employment</label>
                            <input type="text" name="employment" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Education</label>
                            <input type="text" name="education" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Recent Offense</label>
                            <input type="text" name="recent_offence" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Offense Date</label>
                            <input type="date" name="offence_date" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Other Offense</label>
                            <input type="text" name="other_offence" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="order_id">Order</label>
                            <input type="text" name="order_id" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Next Date</label>
                            <input type="date" name="next_date" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Completed</label>
                            <input type="text" name="status" class="form-control" placeholder="Name">
                            <input type="Date" name="completed_date" class="form-control" placeholder="Name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addNew" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


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
                            <a href="offenders_list.php"  class="btn btn-danger float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example5" class="table table-bordered table-striped">
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

                                                    <tr>
                                                        <th>Action</th>
                                                        <td>
                                                            <a href="regedit.php?nic=<?php echo $row['nic'];?>" class="btn btn-info">Edit</a>
                                                            <button type="button" value="<?php echo $row['nic'];?>" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#DeleteModal">Delete</button>
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

