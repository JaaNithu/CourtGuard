<?php
 require 'admin/config/function.php';

 if (isset($_SESSION['auth'])) 
 {
    logoutSession();
    redirect('login.php', 'Logged Out Successfully');
 }
?>