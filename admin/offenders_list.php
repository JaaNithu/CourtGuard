<?php 
    include ('includes/header.php');
    include ('includes/topbar.php');
    include ('includes/sidebar.php');
    include ('config/dbcon.php');
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
                            <select name="ds_division" class="form-control" id="ds_division">
                                <option value="">Select DS Division</option>
                                <?php
                                // Assuming $conn is your database connection
                                $query = "SELECT ds_id, name FROM ds_division";
                                $result = mysqli_query($con, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['ds_id'] . "'>" . $row['name'] . "</option>";
                                }
                                ?>
                            </select>
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
                            <label for="order_id">Order</label>
                            <input type="text" name="order_id" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Next Date</label>
                            <input type="date" name="next_date" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Completed</label>
                            <input type="checkbox" name="status"> Yes
                            <input type="date" name="completed_date" class="form-control" placeholder="Name">
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
                            <h3 class="card-title">Offenders Details</h3>
                            <a href="#"  class="btn btn-primary float-right" data-toggle="modal" data-target="#AddOffenceModal">Add Offenders</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example5" class="table table-bordered table-striped">
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
                                        $cr_details_query = "SELECT * FROM cr_details";
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
                                                        <a href="viewDetails.php?nic=<?php echo $row['nic']; ?>" class="btn btn-info viewBtn">View</a>
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