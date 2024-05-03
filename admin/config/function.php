<?php
    session_start();
    require 'dbcon.php';

    function validate($inputData)
    {
        global $con;

        // If $inputData is an array, validate each element
        if (is_array($inputData)) {
            foreach ($inputData as $value) {
                $value = mysqli_real_escape_string($con, $value);
            }
            return $inputData;
        } else {
            // If $inputData is a string, validate and return
            return mysqli_real_escape_string($con, $inputData);
        }
    }

    // function validate($inputData)
    // {
    //     global $con;

    //     $validatedData = mysqli_real_escape_string($con, $inputData);
    //     return trim($validatedData);
    // }


    function redirect($url, $status)
    {
        $_SESSION['status'] = $status;
        header("Location: ".$url);
        exit(0);
    }
    
    function alertMessage(){
        if (isset($_SESSION['status'])) {
            echo '<div class="alert alert-success">
                <h5>'.$_SESSION['status'].'</h5>
            </div>';
            unset($_SESSION['status']);
        }
    }

    function logoutSession(){
        unset($_SESSION['auth']);
        unset($_SESSION['loggedInUserRole']);
        unset($_SESSION['auth_user']);
    }
?>