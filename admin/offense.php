<?php
    include ('config/dbcon.php');

    include ('includes/header.php');
    include ('includes/topbar.php');
    include ('includes/sidebar.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="py-5">
    <a href="categoryList.php"  class="btn btn-danger float-right padding-right-5">Back</a>
        <div class="container" style="padding-top: 80px; padding-left: 80px;">
            <div class="row ">
                <div class="col-md-6">
                    <div class="card shadow-lg">
                    <?php
                                    if(isset($_GET['cate_id']))
                                    {
                                        $cate_id = $_GET['cate_id'];
                                    }
                    $category_query = "SELECT offense_category.name AS category_name,COUNT(DISTINCT cr_details.nic) AS total_offenders, SUM(CASE WHEN cr_details.gender = 'Male' THEN 1 ELSE 0 END) AS male_count,
                    SUM(CASE WHEN cr_details.gender = 'Female' THEN 1 ELSE 0 END) AS female_count,
                    COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Eravur Pattu DS' THEN cr_details.nic END) AS eravur_pattu_count,
                    COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Eravur Town DS' THEN cr_details.nic END) AS eravur_town_count,
                    COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Kattankudy DS' THEN cr_details.nic END) AS kattankudy_count,
                    COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Koralai Pattu Central DS' THEN cr_details.nic END) AS koralai_pattu_central_count,
                    COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Koralai Pattu DS' THEN cr_details.nic END) AS koralai_pattu_count,
                    COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Koralai Pattu North DS' THEN cr_details.nic END) AS koralai_pattu_north_count,
                    COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Koralai Pattu South DS' THEN cr_details.nic END) AS koralai_pattu_south_count,
                    COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Koralai Pattu West DS' THEN cr_details.nic END) AS koralai_pattu_west_count,
                    COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Manmunai North DS' THEN cr_details.nic END) AS manmunai_north_count,
                    COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Manmunai Pattu DS' THEN cr_details.nic END) AS manmunai_pattu_count,
                    COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Manmunai South & Eruvil Pattu DS' THEN cr_details.nic END) AS manmunai_south_eruvil_pattu_count,
                    COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Manmunai South West DS' THEN cr_details.nic END) AS manmunai_south_west_count,
                    COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Manmunai West DS' THEN cr_details.nic END) AS manmunai_west_count,COUNT(DISTINCT CASE WHEN cr_details.ds_division = 'Porativu Pattu DS' THEN cr_details.nic END) AS porativu_pattu_count, COUNT(cr_details.nic) AS total_count
                                            FROM
                                                cr_details
                                                INNER JOIN offence_table ON cr_details.nic = offence_table.nic
                                                INNER JOIN offense ON offense.off_id = offence_table.off_id
                                                INNER JOIN offense_category ON offence_table.cat_id = offense_category.cat_id
                                            WHERE
                                                offense_category.cat_id = ?
                                            GROUP BY
                                                offense_category.cat_id";
                                        // Prepare and execute the query
                            $category_query_statement = mysqli_prepare($con, $category_query);
                            mysqli_stmt_bind_param($category_query_statement, "s", $cate_id);
                            mysqli_stmt_execute($category_query_statement);
                            $result = mysqli_stmt_get_result($category_query_statement);

                            if ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                            <div class="card-header text-center">
                                            <h5><?php echo $row['category_name'] ?></h5>
                                            </div>
                                            <div class="card-body">
                                                <p>Total cases: <?php echo $row['total_count']?></p>
                                                <p>Total offenders: <?php echo $row['total_offenders']?></p>
                                                <p>Male: <?php echo $row['male_count']?></p>
                                                <p>Female: <?php echo $row['female_count']?></p>
                                                <p>Eravur Pattu DS: <?php echo $row['eravur_pattu_count']?></p>
                                                <p>Eravur Town DS: <?php echo $row['eravur_town_count']?></p>
                                                <p>Kattankudy DS: <?php echo $row['kattankudy_count']?></p>
                                                <p>Koralai Pattu Central DS: <?php echo $row['koralai_pattu_central_count']?></p>
                                                <p>Koralai Pattu DS: <?php echo $row['koralai_pattu_count']?></p>
                                                <p>Koralai Pattu North DS: <?php echo $row['koralai_pattu_north_count']?></p>
                                                <p>Koralai Pattu South DS: <?php echo $row['koralai_pattu_south_count']?></p>
                                                <p>Koralai Pattu West DS: <?php echo $row['koralai_pattu_west_count']?></p>
                                                <p>Manmunai North DS: <?php echo $row['manmunai_north_count']?></p>
                                                <p>Manmunai Pattu DS: <?php echo $row['manmunai_pattu_count']?></p>
                                                <p>Manmunai South & Eruvil Pattu DS: <?php echo $row['manmunai_south_eruvil_pattu_count']?></p>
                                                <p>Manmunai South West DS: <?php echo $row['manmunai_south_west_count']?></p>
                                                <p>Manmunai West DS: <?php echo $row['manmunai_west_count']?></p>
                                                <p>Porativu Pattu DS: <?php echo $row['porativu_pattu_count']?></p>
                                            </div>
                                            <?php
                                            }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td>Not found</td>
                                                </tr>
                                            <?php
                                        }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Body Part End-->
<?php include ('includes/scripts.php');?>
<?php include ('includes/footer.php');?>