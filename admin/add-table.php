<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>
            Add Admin
        </h1>
        <br><br>

<?php 
if(isset($_SESSION['add-t']))
{
    echo $_SESSION['add-t'];
    unset($_SESSION['add-t']);
}


?>


        
        <form action="" method="POST">
            <table class="tbl-30"> 
                <tr>
                    <td>Numero:</td>
                    <td><input type="text" name="number" placeholder="entrez le numero de la table" required></td>
                </tr>
                

                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="add table" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>



    </div>
</div>



<?php include('partials/pied.php'); ?>

<?php
//the vaalue from form and save it in data base
if( isset($_POST['submit']))
{

//echo"button a été clicker";

//1.get data from data  base 'nzid echo 9belha bach nAfichiha fl'ecran te3 la cuisine'
 $number= $_POST['number'];
//password encryption withmd5
 //2.sql query to save the data in database
 $sql = "INSERT INTO tbl_table SET
   number='$number'
  ";


//3. execute quey and save data in bdd 
$res = mysqli_query($conn, $sql) or die(mysql_error());

//4. check if data is inserted or not(query eecuted or not )and display error message
if($res==TRUE)
{
    //echo "data inserted";
    //create a session var to display message
    $_SESSION['add-t']= "Table added seccussfully";
   //redirect to manage-admin
    header("location:".SITEURL.'admin/manage-table.php');
}
else{
    //echo "failed";

   //create a session var to display message
   $_SESSION['add-tTable']= "Admin failed to be added";
   //redirect to manage-admin
    header("location:".SITEURL.'admin/add-table.php');



}
}



?>