<?php include('partials/menu.php')?>

    <!-- main content section -->
    <div class="main-content">
        <div class="wrapper">
<!-- zedtha jdida -->

       


           <?php
           if(isset($_SESSION['login']))
           {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
           }
           
           
           ?>
<br><br>


           <h1>Gérer cashier</h1>
           <br>
<br>

<!-- zadtha jdida -->
<?php 
if(isset($_SESSION['add-cash']))
{
    echo $_SESSION['add-cash'];//displaying session message
    unset($_SESSION['add-cash']);//removing session message after one time

}
if(isset($_SESSION['delete-cash']))
{
    echo $_SESSION['delete-cash'];//displaying session message
    unset($_SESSION['delete-cash']);//removing session message after one time

}
if(isset($_SESSION['update-cash']))
{
    echo $_SESSION['update-cash'];//displaying session message
    unset($_SESSION['update-cash']);//removing session message after one time

}
if(isset($_SESSION['user-not-found3']))
{
    echo $_SESSION['user-not-found3'];//displaying session message
    unset($_SESSION['user-not-found3']);//removing session message after one time

}
if(isset($_SESSION['pwd-not-matched3']))
{
    echo $_SESSION['pwd-not-matched3'];//displaying session message
    unset($_SESSION['pwd-not-matched3']);//removing session message after one time

}
if(isset($_SESSION['changer-mdp3']))
{
    echo $_SESSION['changer-mdp3'];//displaying session message
    unset($_SESSION['changer-mdp3']);//removing session message after one time

}


?>

<br><br>
<!-- bouton pour ajouter les admins -->
<a href="add-cashier.php" class="btn-primary">
    Add cashier
</a><br><br>
           <table class="tbl-full">
            <tr>
                <th>num</th>
                <th>Nom/Prenom</th>
                <th>Pseudo</th>
                <th>Actions</th>
            </tr>
<?php
//get all admins
$sql= "SELECT * FROM tbl_cashier";
//execute
$res= mysqli_query($conn, $sql);
//check whther the query is executing or not
if($res==TRUE)
{
    //count rows
    $count=mysqli_num_rows($res);
    $num=1;//var bach mattetkhalatch fel display te3 id_cashier
    //check the num of rows
    if($count>0)
    {
        //we have dbb
        while($rows=mysqli_fetch_assoc($res))
        {
          //get all data
          //get individual data
          $id_cashier=$rows['id_cashier'];
          $full_name=$rows['full_name'];
          $username=$rows['username'];
          //display in table
         ?>

<tr>
                <td><?php echo $num++;?></td>
                <td><?php echo $full_name;?></td>
                <td><?php echo $username?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/update-password3.php?id_cashier=<?php echo $id_cashier; ?>" class="btn-primary">Changer mot de passe</a>
                    <a href="<?php echo SITEURL; ?>admin/update-cashier.php?id_cashier=<?php echo $id_cashier; ?>" class="btn-secondary">M.à.j cashier</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-cashier.php?id_cashier=<?php echo $id_cashier; ?>" class="btn-supp">Supprimer cashier</a>
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