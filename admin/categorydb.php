<?php
// include('authentication.php');
include('config/dbcon.php');

if(isset($_POST['category_save']))
{
    $name = $_POST['name'];
    $status = $_POST['status'] == true ? '1' : '0';

    $category_query = "INSERT INTO offense_category (name,status) VALUES ('$name', '$status')";
    $category_query_run = mysqli_query($con, $category_query);

    
    if ($category_query_run)
    {
        $_SESSION['status'] = "Category Inserted Successfully";
        header("Location: category.php");
    }
    else
    {
        $_SESSION['status'] = "Category Insertion Failed";
        header("Location: category.php");
    }
}

if (isset($_POST['category_update']))
{
    $cate_id = $_POST['cat_id'];
    $name = $_POST['name'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE offense_category SET name='$name', status='$status' WHERE cat_id= '$cate_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run)
    {
        $_SESSION['status'] = "Category Updated Successfully";
        header("Location: category.php");
    }
    else
    {
        $_SESSION['status'] = "Category Updating Failed.!";
        header("Location: category.php");
    }
}

if (isset($_POST['cate_delete_btn']))
{
    $cate_id = $_POST['cate_delete_id']; //input name
    $query = "DELETE FROM offense_category WHERE cat_id='$cate_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run)
    {
        $_SESSION['status'] = "Category Deleted Successfully";
        header("Location: category.php");
    }
    else
    {
        $_SESSION['status'] = "Category Deleting Failed.!";
        header("Location: category.php");
    }
}
?>