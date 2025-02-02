<?php 
// include constants.php 
include('../config/constants.php');//1.get the id_admin ofadmin to be deleted

 $id_admin = $_GET['id_admin'];//get and affiche the id_admin


//2.sql query to delete

$sql ="DELETE FROM tbl_admin WHERE id_admin=$id_admin";
//execute the query
$res = mysqli_query($conn, $sql);
//check if query executed successfully
if($res==TRUE)
{
    //query nice 
    //echo "Admin deleted";
    //create session to display message
    $_SESSION['delete']= "<div class='success'>Admin deleted successfully</div>";
    //redirect to  admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    //failed delete admin
   // echo "failed delete admin";
   $_SESSION['delete']= "<div class='error'>Admin not deleted (failed)</div>";
   //redirect to  admin page
   header('location:'.SITEURL.'admin/manage-admin.php');

}

//3.redirect to  manage admin page with sucess or error

?>