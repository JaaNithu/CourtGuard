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
                            <a href="category.php"  class="btn btn-danger float-right">Back</a>
                        </div>
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
                                <!-- <tbody>
                                    <?php
                                        // Prepare a statement to retrieve the offenders for the category
                                        $cr_details_query = "SELECT cr_details.*, offense.odate AS odate, offense.odescription AS odescription
                                                            FROM cr_details
                                                            INNER JOIN  offence_table ON cr_details.nic= offence_table.nic
                                                            INNER JOIN offense ON offense.off_id= offence_table.off_id
                                                            INNER JOIN offense_category ON offence_table.cat_id = offense_category.cat_id WHERE offence_table.cat_id = '?' ";
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
                                                        <a href="catOneDataView.php?nic=<?php echo $row['nic']; ?>" class="btn btn-info viewBtn">View</a>
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
                                </tbody> -->
                                <tbody>
                                    <?php
                                    // Prepare a statement to retrieve the offenders for the category
                                        $cr_details_query = "SELECT cr_details.*, MIN(offense.odate) AS odate, offense.odescription AS odescription
                                                        FROM cr_details
                                                        INNER JOIN  offence_table ON cr_details.nic = offence_table.nic
                                                        INNER JOIN offense ON offense.off_id = offence_table.off_id
                                                        INNER JOIN offense_category ON offence_table.cat_id = offense_category.cat_id
                                                        WHERE offense_category.cat_id = ? GROUP BY cr_details.nic ";
                                    
                                    // Prepare the statement
                                    $cr_details_statement = mysqli_prepare($con, $cr_details_query);
                                    
                                    // Bind the parameter
                                    

                                    $cat_id = $_GET['cate_id'] ?? '';
                                    mysqli_stmt_bind_param($cr_details_statement, "s", $cat_id);
                                    
                                    // Execute the statement
                                    mysqli_stmt_execute($cr_details_statement);
                                    
                                    // Get the result
                                    $cr_details_query_run = mysqli_stmt_get_result($cr_details_statement);

                                    if (mysqli_num_rows($cr_details_query_run) > 0) {
                                        foreach ($cr_details_query_run as $row) {
                                            //echo $row['name'];
                                            ?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><img src="uploads/offenders/<?php echo $row['photo']; ?>" width="50px" height="50px"/></td>
                                                <td><?php echo $row['nic']; ?></td>
                                                <td><?php echo $row['register_number']; ?></td>
                                                <td><?php echo $row['case_no']; ?></td>
                                                <td><?php echo $row['full_name']; ?></td>
                                                <td>
                                                    <a href="catOneDataView.php?nic=<?php echo $row['nic']; ?>" class="btn btn-info viewBtn">View</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
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