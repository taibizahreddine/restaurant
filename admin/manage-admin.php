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


           <h1>Gérer ADMIN</h1>
           <br>
<br>

<!-- zadtha jdida -->
<?php 
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];//displaying session message
    unset($_SESSION['add']);//removing session message after one time

}
if(isset($_SESSION['delete']))
{
    echo $_SESSION['delete'];//displaying session message
    unset($_SESSION['delete']);//removing session message after one time

}
if(isset($_SESSION['update']))
{
    echo $_SESSION['update'];//displaying session message
    unset($_SESSION['update']);//removing session message after one time

}
if(isset($_SESSION['user-not-found']))
{
    echo $_SESSION['user-not-found'];//displaying session message
    unset($_SESSION['user-not-found']);//removing session message after one time

}
if(isset($_SESSION['pwd-not-matched']))
{
    echo $_SESSION['pwd-not-matched'];//displaying session message
    unset($_SESSION['pwd-not-matched']);//removing session message after one time

}
if(isset($_SESSION['changer-mdp']))
{
    echo $_SESSION['changer-mdp'];//displaying session message
    unset($_SESSION['changer-mdp']);//removing session message after one time

}


?>

<br><br>
<!-- bouton pour ajouter les admins -->
<a href="add-admin.php" class="btn-primary">
    Add Admin
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
$sql= "SELECT * FROM tbl_admin";
//execute
$res= mysqli_query($conn, $sql);
//check whther the query is executing or not
if($res==TRUE)
{
    //count rows
    $count=mysqli_num_rows($res);
    $num=1;//var bach mattetkhalatch fel display te3 id_admin
    //check the num of rows
    if($count>0)
    {
        //we have dbb
        while($rows=mysqli_fetch_assoc($res))
        {
          //get all data
          //get individual data
          $id_admin=$rows['id_admin'];
          $full_name=$rows['full_name'];
          $username=$rows['username'];
          //display in table
         ?>

<tr>
                <td><?php echo $num++;?></td>
                <td><?php echo $full_name;?></td>
                <td><?php echo $username?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id_admin=<?php echo $id_admin; ?>" class="btn-primary">Changer mot de passe</a>
                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id_admin=<?php echo $id_admin; ?>" class="btn-secondary">M.à.j Admin</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id_admin=<?php echo $id_admin; ?>" class="btn-supp">Supprimer Admin</a>
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