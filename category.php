<?php 
$pageTitle = "Categories";

include ('includes/header.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container" style="padding-top: 50px; padding-bottom: 80px;">
            <div class="row" >
                <div class="col-md-12">
                <?= alertMessage()?>
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>
                                Category of Offense
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>View</th>
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
                                                            <a href="#" class="btn btn-info" style="margin-right: 10px;">View</a>
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
<?php include ('includes/footer.php');?>