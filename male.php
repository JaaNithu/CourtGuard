<?php 
$pageTitle = "Name List";
include ('includes/header.php');?>
<!-- <div class="py-3 bg-secondary">
    <div class="container">
        <h4 class="text-white text-center mb-0">Offenders List</h4>
    </div>
</div> -->

<div class="py-5 bg-white">
    <div class="container">
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="padding-bottom: 10px;">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div> -->

              <!-- /.card-header -->
              <div class="card-body">
              <div class="card-header d-flex justify-content-between align-items-center">
                                <div></div> <!-- This empty div will push the button to the right -->
                                <a href="user_index.php" class="btn btn-danger">Back</a>
                            </div><br>
                <div class="row g-3 align-items-center justify-content-end" style="padding-bottom: 15px;">
                    <div class="col-auto">
                        <label for="searchInput" class="col-form-label">Search</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                    </div>
                </div>

                <table id="dataTable" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr >
                            <th>Name</th>
                            <th>NIC</th>
                            <th>Full Name</th>
                            <th>Register No</th>
                            <th>Case No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php
                            $cr_details_query = "SELECT * FROM cr_details WHERE gender = 'Male' ";
                            $cr_details_query_run = mysqli_query($con, $cr_details_query);

                            if(mysqli_num_rows($cr_details_query_run) > 0){
                                foreach($cr_details_query_run as $row){
                                    //echo $row['name'];
                                    ?>
                                    <tr>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['nic'];?></td>
                                        <td><?php echo $row['full_name'];?></td>
                                        <td><?php echo $row['register_number'];?></td>
                                        <td><?php echo $row['case_no'];?></td>
                                        <td>
                                            <a href="male_view_details.php?nic=<?php echo $row['nic']; ?>" class="btn btn-info viewBtn">View</a>
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
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
    <!-- /.content -->
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const dataTable = document.getElementById('dataTable');
    const tableRows = dataTable.getElementsByTagName('tr');

    searchInput.addEventListener('keyup', function(event) {
        const searchValue = event.target.value.toLowerCase();

        for (let i = 1; i < tableRows.length; i++) {
            const rowData = tableRows[i].getElementsByTagName('td');

            let found = false;
            for (let j = 0; j < rowData.length; j++) {
                const cellData = rowData[j].textContent.toLowerCase();
                if (cellData.includes(searchValue)) {
                    found = true;
                    break;
                }
            }

            if (found) {
                tableRows[i].style.display = '';
            } else {
                tableRows[i].style.display = 'none';
            }
        }
    });
});

</script>
<?php include ('includes/footer.php');?>