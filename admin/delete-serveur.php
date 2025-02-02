<?php 
// include constants.php 
include('../config/constants.php');//1.get the id_serveur  of waiter to be deleted

 $id_serveur = $_GET['id_serveur'];//get and affiche the id_serveur


//2.sql query to delete

$sql ="DELETE FROM tbl_serveur WHERE id_serveur=$id_serveur";
//execute the query
$res = mysqli_query($conn, $sql);
//check if query executed successfully
if($res==TRUE)
{
    //query nice 
    //echo "wiater deleted";
    //create session to display message
    $_SESSION['delete-ser']= "<div class='success'>waiter deleted successfully</div>";
    //redirect to  waiter page
    header('location:'.SITEURL.'admin/manage-serveur.php');
}
else{
    //failed delete waiter
   // echo "failed delete waiter";
   $_SESSION['delete-ser']= "<div class='error'>waiter not deleted (failed)</div>";
   //redirect to  waiter page
   header('location:'.SITEURL.'admin/manage-serveur.php');

}

//3.redirect to  manage waiter page with sucess or error

?>