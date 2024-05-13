<?php
    include ('config/dbcon.php');

    include ('includes/header.php');
    include ('includes/topbar.php');
    include ('includes/sidebar.php');
?>
<!--Body Part-->

<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Offense Category</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="categorydb.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="" hidden>Status</label>
                        <input type="checkbox" name="status" hidden> Yes
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" name="category_save" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php include ('message.php');?>
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>
                                Category of Offense
                                <a href="#" data-toggle="modal" data-target="#categoryModal" class="btn btn-primary float-right">Add</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM offense_category";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $cate)
                                            {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $cate['cat_id'];?></td>
                                                        <td><?php echo $cate['name'];?></td>
                                                        <td>
                                                            <a href="categoryView.php?cate_id=<?php echo $cate['cat_id']; ?>" class="btn btn-info" style="margin-right: 10px;">View</a>
                                                        </td>
                                                        
                                                        <td>
                                                            <form action="categorydb.php" method="POST">
                                                                <input type="hidden" name="cate_delete_id" value="<?= $cate['cat_id'];?>">
                                                                <button type="submit" name="cate_delete_btn" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        }else
                                        {
                                            echo "No record found.";
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