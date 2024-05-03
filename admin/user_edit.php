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
              <li class="breadcrumb-item active">Edit User Details</li>
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
                            <h3 class="card-title">Edit User Details</h3>
                            <a href="user.php"  class="btn btn-danger float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-md-6">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <?php 
                                        if(isset($_GET['user_id'])){
                                            $user_id = $_GET['user_id'];
                                            $user_details_query = "SELECT * FROM user WHERE id = '$user_id' LIMIT 1";
                                            $user_details_query_run = mysqli_query($con, $user_details_query);

                                            if(mysqli_num_rows($user_details_query_run) > 0){
                                                foreach($user_details_query_run as $row){
                                                    ?>
                                                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" value="<?php echo $row['name']?>" class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" name="email" value="<?php echo $row['email']?>" class="form-control" placeholder="Email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Password</label>
                                                        <input type="text" name="password" value="<?php echo $row['password']?>" class="form-control" placeholder="Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="role">Give role</label>
                                                        <select name="role_name" class="form-control" id="" required>
                                                            <option value="">Select..</option>
                                                            <option value="User" <?php echo $row['role_name'] == 'User' ? 'selected':'' ; ?>>User</option>
                                                            <option value="Admin" <?php echo $row['role_name'] == 'Admin' ? 'selected':'' ; ?>>Admin</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="role">Role</label>
                                                        <input type="checkbox" class="form-control" style="width: 30px; height: 30px;" name="role" <?php echo $row['role'] == "1" ? 'checked' : ''; ?>>
                                                    </div>
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
                                        <button type="submit" name="updateUserDetails" class="btn btn-info">Update</button>
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