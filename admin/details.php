<?php
session_start();
include ('config/dbcon.php');



if(isset($_POST['addNew'])){
    $name = $_POST['name'];
    $photo = $_FILES['photo']['name'];
    $register_number = $_POST['register_number'];
    $case_no = $_POST['case_no'];
    $full_name = $_POST['full_name'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $civil_status = $_POST['civil_status'];
    $parents_name = $_POST['parents_name'];
    $children_details = $_POST['children_details'];
    $permanent_address = $_POST['permanent_address'];
    $ds_division = $_POST['ds_division'];
    $gs_division = $_POST['gs_division'];
    $race = $_POST['race'];
    $religion = $_POST['religion'];
    $nationality = $_POST['nationality'];
    $phone_num = $_POST['phone_num'];
    $employment = $_POST['employment'];
    $education = $_POST['education'];
    $recent_offence = $_POST['recent_offence'];
    $offence_date = $_POST['offence_date'];
    $order_id = $_POST['order_id'];
    $next_date = $_POST['next_date'];
    $status = $_POST['status'] == true ? 'Yes' : 'No';
    $completed_date = $_POST['completed_date'];
    $odate = $_POST['offence_date'];
    $odescription = $_POST['recent_offence'];

    $allowed_extension = array('png','jpg','jpeg');
    $file_extension = pathinfo($photo, PATHINFO_EXTENSION);

    $filename = time().'.'.$file_extension;
    if (!in_array($file_extension, $allowed_extension))
    {
        $_SESSION['status'] = "You are allowed with only jpg, jpeg, and png images.!";
        header('Location: offenders_list.php');
        exit(0);
    }
    else
    {
        $cr_details_query = "INSERT INTO cr_details (name,photo,register_number,case_no,full_name,nic,dob,age,gender,civil_status,parents_name,children_details,permanent_address,ds_division,gs_division,race,religion,nationality,phone_num,employment,education,recent_offence,offence_date,order_id,next_date,status,completed_date) 
        VALUES ('$name','$filename','$register_number','$case_no','$full_name','$nic','$dob','$age','$gender','$civil_status','$parents_name','$children_details','$permanent_address','$ds_division','$gs_division','$race','$religion','$nationality','$phone_num','$employment','$education','$recent_offence','$offence_date','$order_id','$next_date','$status','$completed_date')";

        $cr_details_query_run = mysqli_query($con, $cr_details_query);

        if($cr_details_query_run)
        {
            move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/offenders/'.$filename);
            $_SESSION['status'] = "Details Added Successfully";
            header("Location: offenders_list.php");

            // Offender does not have existing offense records, insert new records
            $insert_offense_query = "INSERT INTO offense (odate, odescription) VALUES ('$odate', '$odescription')";
            $insert_offense_result = mysqli_query($con, $insert_offense_query);
            if (!$insert_offense_result)
            {
                // Handle insert error
                $_SESSION['status'] = "Error inserting offense details: " . mysqli_error($con);
                header("Location: offenders_list.php");
                exit(0);
            }
            else
            {
                // Insert into main offense table
                $main_offense_insert_query = "INSERT INTO offence_table (off_id,nic) VALUES (LAST_INSERT_ID(),'$nic')";
                $main_offense_insert_result = mysqli_query($con, $main_offense_insert_query);

                if (!$main_offense_insert_result)
                {
                    // Handle main offense insert error
                    $_SESSION['status'] = "Error inserting into main offense table: " . mysqli_error($con);
                    header("Location: offenders_list.php");
                    exit(0);
                }
                else
                {
                    $_SESSION['status'] = "All Details Inserted Successfully";
                    header("Location: offenders_list.php");
                    exit(0);
                }
            }
        }
        else
        {
            $_SESSION['status'] = "Details Added Failed";
            header("Location: offenders_list.php");
        }
    }
}



if(isset($_POST['updateDetails'])){
    $name = $_POST['name'];
    $photo = $_FILES['photo']['name'];
    $old_photo =$_POST['old_photo'];
    $register_number = $_POST['register_number'];
    $case_no = $_POST['case_no'];
    $full_name = $_POST['full_name'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $civil_status = $_POST['civil_status'];
    $parents_name = $_POST['parents_name'];
    $children_details = $_POST['children_details'];
    $permanent_address = $_POST['permanent_address'];
    $ds_division = $_POST['ds_division'];
    $gs_division = $_POST['gs_division'];
    $race = $_POST['race'];
    $religion = $_POST['religion'];
    $nationality = $_POST['nationality'];
    $phone_num = $_POST['phone_num'];
    $employment = $_POST['employment'];
    $education = $_POST['education'];
    $recent_offence = $_POST['recent_offence'];
    $offence_date = $_POST['offence_date'];
    $odate = $_POST['odate'];
    $odescription = $_POST['odescription'];
    $order_id = $_POST['order_id'];
    $next_date = $_POST['next_date'];
    $status = $_POST['status'] == true ? '1' : '0';
    $completed_date = $_POST['completed_date'];

    if ($photo != '')
    {
        $update_filename = $_FILES['photo']['name'];

        $allowed_extension = array('png','jpg','jpeg');
        $file_extension = pathinfo($update_filename, PATHINFO_EXTENSION);
        $filename = time().'.'.$file_extension;
        if (!in_array($file_extension, $allowed_extension))
        {
            $_SESSION['status'] = "You are allowed with only jpg, jpeg, and png images.!";
            header('Location: offenders_list.php');
            exit(0);
        }
        $update_filename = $filename;
    }
    else
    {
        $update_filename = $old_photo;
    }
    $cr_details_query = "UPDATE cr_details SET name='$name', photo='$update_filename',
    register_number='$register_number',
    case_no='$case_no',
    full_name='$full_name',
    nic='$nic',
    dob='$dob',
    age='$age',
    gender='$gender',
    civil_status='$civil_status',
    parents_name='$parents_name',
    children_details='$children_details',
    permanent_address='$permanent_address',
    ds_division='$ds_division',
    gs_division='$gs_division',
    race='$race',
    religion='$religion',
    nationality='$nationality',
    phone_num='$phone_num',
    employment='$employment',
    education='$education',
    recent_offence = '$recent_offence',
    offence_date = '$offence_date',
    order_id='$order_id',
    next_date='$next_date',
    status='$status',
    completed_date='$completed_date' WHERE nic='$nic'";

    $cr_details_query_run = mysqli_query($con, $cr_details_query);

    if($cr_details_query_run)
    {
        if ($photo != '')
        {
            move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/offenders/'.$filename);
            if (file_exists('uploads/offenders/'.$old_photo))
            {
                unlink("uploads/offenders/".$old_photo);
            }
        }

        $offense_query = "SELECT * FROM offence_table WHERE nic = '$nic'";
        $offense_result = mysqli_query($con, $offense_query);

        if(mysqli_num_rows($offense_result) > 0)
        {
            // Offender does not have existing offense records, insert new records
            $insert_offense_query = "INSERT INTO offense (odate, odescription) VALUES ('$odate', '$odescription')";
            $insert_offense_result = mysqli_query($con, $insert_offense_query);
            if (!$insert_offense_result) {
                // Handle insert error
                $_SESSION['status'] = "Error inserting offense details: " . mysqli_error($con);
                header("Location: offenders_list.php?cr_nic=".$nic);
                exit(0);
            }

            // Insert into main offense table
            $main_offense_insert_query = "INSERT INTO offence_table (off_id, nic) VALUES (LAST_INSERT_ID(), '$nic')";
            $main_offense_insert_result = mysqli_query($con, $main_offense_insert_query);

            if (!$main_offense_insert_result) {
                // Handle main offense insert error
                $_SESSION['status'] = "Error inserting into main offense table: " . mysqli_error($con);
                header("Location: offenders_list.php?cr_nic=".$nic);
                exit(0);
            }
        }

        $_SESSION['status'] = "Details Updated Successfully";
        header("Location: offenders_list.php?cr_nic=".$nic);
        exit(0);
    }
    else{
        $_SESSION['status'] = "Details Updating Failed";
        header("Location: offenders_list.php?cr_nic=".$nic);
        exit(0);
    }
}

if(isset($_POST['deleteNicBtn']))
{
    $cri_nic = $_POST['delete_cr_nic'];
    $cr_details_query = "DELETE FROM cr_details WHERE nic='$cri_nic' ";
    $cr_details_query_run = mysqli_query($con, $cr_details_query);

    if($cr_details_query_run){
        $_SESSION['status'] = "Details Deleted Successfully";
        header("Location: offenders_list.php");
    }
    else{
        $_SESSION['status'] = "Details Deleting Failed";
        header("Location: offenders_list.php");
    }
}
?>