<?php 
// include constants.php 
include('../config/constants.php');//1.get the id_table ofadmin to be deleted

 $id_table = $_GET['id_table'];//get and affiche the id_table


//2.sql query to delete

$sql ="DELETE FROM tbl_table WHERE id_table=$id_table";
//execute the query
$res = mysqli_query($conn, $sql);
//check if query executed successfully
if($res==TRUE)
{
    //query nice 
    //echo "Admin deleted";
    //create session to display message
    $_SESSION['delete-t']= "<div class='success'>Table deleted successfully</div>";
    //redirect to  admin page
    header('location:'.SITEURL.'admin/manage-table.php');
}
else{
    //failed delete admin
   // echo "failed delete admin";
   $_SESSION['delete-t']= "<div class='error'>Table not deleted (failed)</div>";
   //redirect to  admin page
   header('location:'.SITEURL.'admin/manage-table.php');

}

//3.redirect to  manage admin page with sucess or error

?>