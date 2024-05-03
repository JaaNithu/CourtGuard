<?php
require 'config/function.php';



if(isset($_POST['check_Emailbtn']))
{
    $email = $_POST['email'];

    $checkemail = "SELECT email FROM user WHERE email='$email'";
    $checkemail_run = mysqli_query($con, $checkemail);

    if(mysqli_num_rows($checkemail_run) > 0)
    {
        echo "Email id already taken.!";
    }
    else
    {
        echo "It's Available";
    }
}

if(isset($_POST['addUser']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $role_name = mysqli_real_escape_string($con, $_POST['role_name']);
    $role = mysqli_real_escape_string($con, $_POST['role']) == true ? '1' : '0';

    if ($name != '' || $email != '' || $password !='' || $role_name != '')
    {
        $user_query = "INSERT INTO user (name,email,password,role_name, role) VALUES ('$name', '$email', '$password','$role_name', '$role')";
        $user_query_run = mysqli_query($con, $user_query);

        
        if ($user_query_run)
        {
            redirect('user.php', 'User Added Successfully');
        }
        else
        {
            redirect('user.php', 'User Adding Failed');
        }
    }
    else
    {
        redirect('user.php', 'Please fill all the input field');
    }
}




if (isset($_POST['updateUserDetails']))
{
    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_name = $_POST['role_name'];
    $role = $_POST['role'] == true ? '1' : '0';

    if ($name != '' || $email != '' || $password !='' || $role_name != '')
    {
        $user_query = "UPDATE user SET name='$name',
        email='$email',
        password='$password',
        role_name= '$role_name',
        role='$role' WHERE id='$user_id'";
        $user_query_run = mysqli_query($con, $user_query);

        if($user_query_run)
        {
            $_SESSION['status'] = "User Updated Successfully";
            header("Location: user.php");
        }
        else
        {
            $_SESSION['status'] = "User Updating Failed";
            header("Location: user.php");
        }
    }
}


if(isset($_POST['DeleteUserbtn']))
{
    $userid = $_POST['delete_id'];

    $query = "DELETE FROM user WHERE id = '$userid";
    $query_run = mysqli_query($con, $query);

    if ($query_run) 
    {
        $_SESSION['status'] = "User Deleted Successfully";
        header("Location: registered.php");
    }
    else
    {
        $_SESSION['status'] = "User Deleting Failed";
        header("Location: registered.php");
    }
}
?>