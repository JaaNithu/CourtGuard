<?php 
    include ('config/dbcon.php');

    include ('includes/header.php');
    include ('includes/topbar.php');
    include ('includes/sidebar.php');
    include ('config/dbcon.php');
?>
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
                                Edit Category
                                <a href="category.php" class="btn btn-danger float-right">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="categorydb.php" method="POST">
                                <?php

                                    if (isset($_GET['cat_id'])) 
                                    {
                                        $cate_id = $_GET['cat_id'];
                                        $query = "SELECT * FROM offense_category WHERE cat_id='$cate_id'";
                                        $query_run = mysqli_query($con, $query);

                                        foreach($query_run as $type) :
                                        ?>
                                        <input type="hidden" name="cate_id" <?= $type['cat_id']?>>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Category Name</label>
                                                <input type="text" name="name" value="<?php echo $type['name'];?>" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <input type="checkbox" name="status" <?php echo $type['status'] == "1" ? 'checked' : ''; ?>> Status
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="category.php" class="btn btn-secondary" type="button">Back</a>
                                            <button class="btn btn-primary" name="category_update" type="submit">Update</button>
                                        </div>

                                    <?php
                                    endforeach;
                                    }
                                    else 
                                    {
                                        echo "No ID Found";
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?php include ('includes/scripts.php');?>
<?php include ('includes/footer.php');?>