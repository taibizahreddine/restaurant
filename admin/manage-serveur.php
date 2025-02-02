<?php include('partials/menu.php')?>

    <!-- main content section -->
    <div class="main-content">
        <div class="wrapper">
           <h1>Gérer serveur</h1>
           <br>
<br>


<?php 
if(isset($_SESSION['add-ser']))
{
    echo $_SESSION['add-ser'];//displaying session message
    unset($_SESSION['add-ser']);//removing session message after one time

}
if(isset($_SESSION['delete-ser']))
{
    echo $_SESSION['delete-ser'];//displaying session message
    unset($_SESSION['delete-ser']);//removing session message after one time

}
if(isset($_SESSION['update-ser']))
{
    echo $_SESSION['update-ser'];//displaying session message
    unset($_SESSION['update-ser']);//removing session message after one time

}
if(isset($_SESSION['user-notfound']))
{
    echo $_SESSION['user-notfound'];//displaying session message
    unset($_SESSION['user-notfound']);//removing session message after one time

}
if(isset($_SESSION['pwd-notmatched']))
{
    echo $_SESSION['pwd-notmatched'];//displaying session message
    unset($_SESSION['pwd-notmatched']);//removing session message after one time

}
if(isset($_SESSION['changer-pw']))
{
    echo $_SESSION['changer-pw'];//displaying session message
    unset($_SESSION['changer-pw']);//removing session message after one time

}


?>

<br><br>
<!-- bouton pour ajouter les admins -->
<a href="add-serveur.php" class="btn-primary">
    Add Waiter
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
$sql= "SELECT * FROM tbl_serveur";
//execute
$res= mysqli_query($conn, $sql);
//check whther the query is executing or not
if($res==TRUE)
{
    //count rows
    $count=mysqli_num_rows($res);
    $num=1;//var bach mattetkhalatch fel display te3 id_serveur
    //check the num of rows
    if($count>0)
    {
        //we have dbb
        while($rows=mysqli_fetch_assoc($res))
        {
          //get all data
          //get individual data
          $id_serveur=$rows['id_serveur'];
          $full_name=$rows['full_name'];
          $username=$rows['username'];
          //display in table
         ?>

<tr>
                <td><?php echo $num++;?></td>
                <td><?php echo $full_name;?></td>
                <td><?php echo $username?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/update-password2.php?id_serveur=<?php echo $id_serveur; ?>" class="btn-primary">Changer mot de passe</a>
                    <a href="<?php echo SITEURL; ?>admin/update-serveur.php?id_serveur=<?php echo $id_serveur; ?>" class="btn-secondary">M.à.j Serveur</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-serveur.php?id_serveur=<?php echo $id_serveur; ?>" class="btn-supp">Supprimer Serveur</a>
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