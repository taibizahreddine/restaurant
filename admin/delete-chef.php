<?php 
// include constants.php 
include('../config/constants.php');//1.get the id_chef ofadmin to be deleted

 $id_chef = $_GET['id_chef'];//get and affiche the id_chef


//2.sql query to delete

$sql ="DELETE FROM tbl_chef WHERE id_chef=$id_chef";
//execute the query
$res = mysqli_query($conn, $sql);
//check if query executed successfully
if($res==TRUE)
{
    //query nice 
    //echo "Admin deleted";
    //create session to display message
    $_SESSION['delete-chef']= "<div class='success'>chef deleted successfully</div>";
    //redirect to  admin page
    header('location:'.SITEURL.'admin/manage-chef.php');
}
else{
    //failed delete admin
   // echo "failed delete admin";
   $_SESSION['delete-chef']= "<div class='error'>chef not deleted (failed)</div>";
   //redirect to  admin page
   header('location:'.SITEURL.'admin/manage-chef.php');

}

//3.redirect to  manage admin page with sucess or error

?>