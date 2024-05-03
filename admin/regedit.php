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
              <li class="breadcrumb-item active">Edit Offenders Details</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Offenders Details</h3>
                            <a href="offenders_list.php"  class="btn btn-danger float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-md">
                                <form action="details.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <?php
                                        if(isset($_GET['nic'])){
                                            $nic = $_GET['nic'];
                                            $cr_details_query = "SELECT cr_details.*, offense.odate AS odate, offense.odescription AS odescription 
                                                                FROM cr_details
                                                                INNER JOIN  offence_table ON cr_details.nic= offence_table.nic
                                                                INNER JOIN offense ON offense.off_id=offence_table.off_id WHERE cr_details.nic = '$nic' LIMIT 1";
                                            $cr_details_query_run = mysqli_query($con, $cr_details_query);

                                            if(mysqli_num_rows($cr_details_query_run) > 0)
                                            {
                                                foreach($cr_details_query_run as $row){
                                                    ?>
                                                    <input type="hidden" name="nic" value="<?php echo $row['nic']?>">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" value="<?php echo $row['name']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="photo">Photo</label>
                                                        <input type="file" name="photo" class="form-control-file">
                                                        <input type="hidden" name="old_photo" value="<?php echo $row['photo']?>">
                                                        <img src="uploads/offenders/<?php echo $row['photo']?>" width="50px" height="50px" alt="image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Register Number</label>
                                                        <input type="text" name="register_number" value="<?php echo $row['register_number']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Case No</label>
                                                        <input type="text" name="case_no" value="<?php echo $row['case_no']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Full Name</label>
                                                        <input type="text" name="full_name" value="<?php echo $row['full_name']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">NIC Number</label>
                                                        <input type="text" name="nic" value="<?php echo $row['nic']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Date of Birth</label>
                                                        <input type="date" name="dob" value="<?php echo $row['dob']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Age</label>
                                                        <input type="text" name="age" value="<?php echo $row['age']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Gender</label>
                                                        <input type="text" name="gender" value="<?php echo $row['gender']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Civil Status</label>
                                                        <input type="text" name="civil_status" value="<?php echo $row['civil_status']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Parents Name</label>
                                                        <input type="text" name="parents_name" value="<?php echo $row['parents_name']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Children Details</label>
                                                        <input type="text" name="children_details" value="<?php echo $row['children_details']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Permanent Address</label>
                                                        <input type="text" name="permanent_address" value="<?php echo $row['permanent_address']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DS Division</label>
                                                        <input type="text" name="ds_division" value="<?php echo $row['ds_division']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">GS Division</label>
                                                        <input type="text" name="gs_division" value="<?php echo $row['gs_division']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Race</label>
                                                        <input type="text" name="race" value="<?php echo $row['race']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Religion</label>
                                                        <input type="text" name="religion" value="<?php echo $row['religion']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nationality</label>
                                                        <input type="text" name="nationality" value="<?php echo $row['nationality']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Phone Number</label>
                                                        <input type="text" name="phone_num" value="<?php echo $row['phone_num']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Employment</label>
                                                        <input type="text" name="employment" value="<?php echo $row['employment']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Education</label>
                                                        <input type="text" name="education" value="<?php echo $row['education']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Recent Offense</label>
                                                        <input type="text" name="recent_offence" value="<?php echo $row['recent_offence']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Offense Date</label>
                                                        <input type="date" name="offence_date" value="<?php echo $row['offence_date']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">All Offense</label>
                                                        <!-- /.row -->
                                                        <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card">
                                                                        <!-- /.card-header -->
                                                                        <div class="card-body table-responsive p-0" style="height: 113px;">
                                                                            <table id="example4" class="table table-bordered table-striped">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Date</th>
                                                                                        <th>Reason</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <input type="date" name="odate" value="<?php echo $row['odate']?>" class="form-control">
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" name="odescription" value="<?php echo $row['odescription']?>" class="form-control">
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <!-- /.card-body -->
                                                                    </div>
                                                                    <!-- /.card -->
                                                                </div>
                                                            </div>
                                                        </div><br>
                                                    <div class="form-group">
                                                        <label for="order_id">Order</label>
                                                        <input type="text" name="order_id" value="<?php echo $row['order_id']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Next Date</label>
                                                        <input type="date" name="next_date" value="<?php echo $row['next_date']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Completed</label>
                                                        <!-- /.row -->
                                                        <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card">
                                                                        <!-- /.card-header -->
                                                                        <div class="card-body table-responsive p-0" style="height: 113px;">
                                                                            <table id="example4" class="table table-bordered table-striped" >
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Status</th>
                                                                                        <th>Date</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                        <input type="checkbox" name="status" <?php echo $row['status'] == true ? 'checked' : ''; ?> /> Yes                                                                                  </td>
                                                                                        <td><input type="date" name="completed_date" value="<?php echo $row['completed_date']?>" class="form-control" placeholder="Name" /></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <!-- /.card-body -->
                                                                    </div>
                                                                    <!-- /.card -->
                                                                </div>
                                                            </div>
                                                        </div><br>
                                                    <?php
                                                }
                                            }
                                            else{
                                                echo "<h4>No Record Found!</h4>";
                                            }
                                        }
                                        ?>
                                        

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="updateDetails" class="btn btn-info">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include ('includes/scripts.php');?>
<?php include ('includes/footer.php');?>