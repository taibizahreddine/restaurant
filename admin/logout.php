<?php
include('../config/constants.php');
//destroy session
session_destroy();//unset session ('user')

//redirect
header('location:'.SITEURL.'admin/login.php');

?>