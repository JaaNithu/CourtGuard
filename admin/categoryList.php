<?php
    include ('config/dbcon.php');

    include ('includes/header.php');
    include ('includes/topbar.php');
    include ('includes/sidebar.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- <div class="py-5">
        <div class="container" style="padding-top: 80px;">
            
            <div class="row ">
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h5>Methamphetamine (Ice)</h5>
                        </div>
                        <div class="card-body">
                            <p>Total</p>
                            <p>Male</p>
                            <p>Female</p>
                            <p>Eravur Pattu DS</p>
                            <p>Eravur Town DS</p>
                            <p>Kattankudy DS</p>
                            <p>Koralai Pattu Central DS</p>
                            <p>Koralai Pattu DS</p>
                            <p>Koralai Pattu North DS</p>
                            <p>Koralai Pattu South DS</p>
                            <p>Koralai Pattu West DS</p>
                            <p>Manmunai North DS</p>
                            <p>Manmunai Pattu DS</p>
                            <p>Manmunai South & Eruvil Pattu DS</p>
                            <p>Manmunai South West DS</p>
                            <p>Manmunai West DS</p>
                            <p>Porativu Pattu DS</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h5>Illicit Liquor</h5>
                        </div>
                        <div class="card-body">
                            <p>Total</p>
                            <p>Male</p>
                            <p>Female</p>
                            <p>Total</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h5>Abin</h5>
                        </div>
                        <div class="card-body">
                            <p>Total</p>
                            <p>Male</p>
                            <p>Female</p>
                            <p>Total</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row ">
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h5>Mawa</h5>
                        </div>
                        <div class="card-body">
                            <p>Total</p>
                            <p>Male</p>
                            <p>Female</p>
                            <p>Total</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h5>Canmbies</h5>
                        </div>
                        <div class="card-body">
                            <p>Total</p>
                            <p>Male</p>
                            <p>Female</p>
                            <p>Total</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h5>Heroine</h5>
                        </div>
                        <div class="card-body">
                            <p>Total</p>
                            <p>Male</p>
                            <p>Female</p>
                            <p>Total</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row ">
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h5>Public Noises</h5>
                        </div>
                        <div class="card-body">
                            <p>Total</p>
                            <p>Male</p>
                            <p>Female</p>
                            <p>Total</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h5>Gambling</h5>
                        </div>
                        <div class="card-body">
                            <p>Total</p>
                            <p>Male</p>
                            <p>Female</p>
                            <p>Total</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h5>Theft</h5>
                        </div>
                        <div class="card-body">
                            <p>Total</p>
                            <p>Male</p>
                            <p>Female</p>
                            <p>Total</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php include ('message.php');?>
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>
                                Category of Offense Count
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
                                                            <a href="offense.php?cate_id=<?php echo $cate['cat_id']; ?>" class="btn btn-info" style="margin-right: 10px;">View</a>
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