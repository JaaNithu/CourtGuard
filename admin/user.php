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
                <h1 class="modal-title" id="exampleModalLabel">Add New Details</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= alertMessage();?>
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="role_name">Give role</label>
                        <select name="role_name" class="form-control" id="" required>
                            <option value="">Select..</option>
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="checkbox" name="role" class="form-control" style="width: 30px; height: 30px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addUser" class="btn btn-primary">Save</button>
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
              <li class="breadcrumb-item active">Registered Users</li>
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
                        <h3 class="card-title">User Details</h3>
                        <a href="#"  class="btn btn-primary float-right" data-toggle="modal" data-target="#AddOffenceModal">Add User</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $user_details_query = "SELECT * FROM user";
                                    $user_details_query_run = mysqli_query($con, $user_details_query);

                                    if(mysqli_num_rows($user_details_query_run) > 0){
                                        foreach($user_details_query_run as $row){
                                            //echo $row['name'];
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['password'];?></td>
                                                <td><?php echo $row['role_name'];?></td>
                                                <td>
                                                    <a href="user_edit.php?user_id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
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