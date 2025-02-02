<?php include('partials/menu.php')?>

    <!-- main content section -->
    <div class="main-content">
        <div class="wrapper">
           <h1>Gérer Les TABLES</h1>
           <br>
<br>


<?php 
if(isset($_SESSION['add-t']))
{
    echo $_SESSION['add-t'];//displaying session message
    unset($_SESSION['add-t']);//removing session message after one time

}
if(isset($_SESSION['delete-t']))
{
    echo $_SESSION['delete-t'];//displaying session message
    unset($_SESSION['delete-t']);//removing session message after one time

}


?>

<br><br>
<!-- bouton pour ajouter les admins -->
<a href="add-table.php" class="btn-primary">
    Add Table
</a><br><br>
           <table class="tbl-full">
            <tr>
                
                <th>numero</th>
                <th>Actions</th>
            </tr>
<?php
//get all admins
$sql= "SELECT * FROM tbl_table";
//execute
$res= mysqli_query($conn, $sql);
//check whther the query is executing or not
if($res==TRUE)
{
    //count rows
    $count=mysqli_num_rows($res);
    $num=1;//var bach mattetkhalatch fel display te3 id_table
    //check the num of rows
    if($count>0)
    {
        //we have dbb
        while($rows=mysqli_fetch_assoc($res))
        {
          //get all data
          //get individual data
          $id_table=$rows['id_table'];
          $number=$rows['number'];
          $status=$rows['status'];
          //display in table
         ?>

<tr>
                
                <td><?php echo $number?></td>
                <td>
                   <a href="<?php echo SITEURL; ?>admin/delete-table.php?id_table=<?php echo $id_table; ?>" class="btn-supp">Supprimer Table</a>
                </td>
            </tr>


         <?php

       }
   }
    else{
        //we don't have it
    }

}

?>





            




           </table>
       
            
        </div>
       
    </div>
    <!-- main content section -->

    <?php include('partials/pied.php')?>