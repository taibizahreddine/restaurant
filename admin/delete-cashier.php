<?php 
// include constants.php 
include('../config/constants.php');//1.get the id_cashier ofadmin to be deleted

 $id_cashier = $_GET['id_cashier'];//get and affiche the id_cashier


//2.sql query to delete

$sql ="DELETE FROM tbl_cashier WHERE id_cashier=$id_cashier";
//execute the query
$res = mysqli_query($conn, $sql);
//check if query executed successfully
if($res==TRUE)
{
    //query nice 
    //echo "Admin deleted";
    //create session to display message
    $_SESSION['delete-cash']= "<div class='success'>cashier deleted successfully</div>";
    //redirect to  admin page
    header('location:'.SITEURL.'admin/manage-cashier.php');
}
else{
    //failed delete admin
   // echo "failed delete admin";
   $_SESSION['delete-cash']= "<div class='error'>cashier not deleted (failed)</div>";
   //redirect to  admin page
   header('location:'.SITEURL.'admin/manage-cashier.php');

}

//3.redirect to  manage admin page with sucess or error

?>