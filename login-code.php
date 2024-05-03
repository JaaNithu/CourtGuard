<?php 

require 'admin/config/function.php';

if (isset($_POST['loginBtn']))
{
    $emailInput = validate($_POST['email']);
    $passwordInput = validate($_POST['password']);

    $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
    $password = filter_var($passwordInput, FILTER_SANITIZE_STRING);

    if ($email != '' && $password != '') 
    {
        $query = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) 
        {
            if (mysqli_num_rows($result) == 1) 
            {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if($row['role_name'] == 'Admin')
                {
                    $_SESSION['auth'] = true;
                    $_SESSION['loggedInUserRole'] = $row['role_name'];
                    $_SESSION['auth_user'] = [
                        'name' => $row['name'],
                        'email' => $row['email']
                    ];
                    redirect('admin/index.php', 'Logged In Successfully');
                }
                else
                {
                    $_SESSION['auth'] = true;
                    $_SESSION['loggedInUserRole'] = $row['role_name'];
                    $_SESSION['auth_user'] = [
                        'name' => $row['name'],
                        'email' => $row['email']
                    ];
                    redirect('user_index.php', 'Logged In Successfully');
                }
            }
            else
            {
                redirect('login.php', 'Invalid Email or Password');
            }
        }
        else
        {
            redirect('login.php', 'Something went wrong');
        }

    }
    else
    {
        redirect('login.php', 'All Fields are mandatory');
    }
}


?>