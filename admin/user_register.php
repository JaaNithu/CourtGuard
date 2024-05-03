<?php 
$pageTitle = "Login";
// include ('includes/header.php');
require 'admin/config/function.php';


// if (isset($_SESSION['auth'])) {
//     redirect('admin/index.php', 'You are already logged in');
// }
if (isset($_SESSION['auth']) && $_SESSION['loggedInUserRole'] == 'User' ) {
    redirect('user_index.php', 'You are already logged in as user');
}

if (isset($_SESSION['auth']) && $_SESSION['loggedInUserRole'] == 'Admin' ) {
    redirect('admin/index.php', 'You are already logged in as admin');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if(isset($pageTitle)){ echo $pageTitle; }else{ echo 'Device Services'; }?></title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

    <div class="py-5">
        <div class="container" style="padding-top: 80px;">
            <div class="row justify-content-center">
                <div class="col-md-4">
                <?= alertMessage(); ?>
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                            <form action="login-code.php" method="POST">
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="loginBtn" class="btn btn-primary w-100">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include ('includes/footer.php');?>