<?php
    if(isset($_SESSION['auth'])) 
    {
        if (isset($_SESSION['loggedInUserRole'])) 
        {
            $role = validate($_SESSION['loggedInUserRole']);
            $email = validate($_SESSION['auth_user']['email']);

            $query = "SELECT * FROM user WHERE email='$email' AND role_name='$role' LIMIT 1";
            $result = mysqli_query($con, $query);

            if ($result)
            {
                if (mysqli_num_rows($result) == 0)
                {
                    logoutSession();
                    redirect('../login.php', 'Access Denied');
                }
                else
                {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if ($row['role_name'] != 'Admin') {
                        logoutSession();
                        redirect('../login.php', 'Access Denied');
                    }
                }
            }
            else
            {
                logoutSession();
                    redirect('../login.php', 'Something Went Wrong');
            }
        }
    }
    else
    {
        redirect('../login.php', 'Login to continue...');
    }

?>