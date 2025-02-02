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


           <h1>Gérer chef</h1>
           <br>
<br>

<!-- zadtha jdida -->
<?php 
if(isset($_SESSION['add-chef']))
{
    echo $_SESSION['add-chef'];//displaying session message
    unset($_SESSION['add-chef']);//removing session message after one time

}
if(isset($_SESSION['delete-chef']))
{
    echo $_SESSION['delete-chef'];//displaying session message
    unset($_SESSION['delete-chef']);//removing session message after one time

}
if(isset($_SESSION['update-chef']))
{
    echo $_SESSION['update-chef'];//displaying session message
    unset($_SESSION['update-chef']);//removing session message after one time

}
if(isset($_SESSION['user-not-found4']))
{
    echo $_SESSION['user-not-found4'];//displaying session message
    unset($_SESSION['user-not-found4']);//removing session message after one time

}
if(isset($_SESSION['pwd-not-matched4']))
{
    echo $_SESSION['pwd-not-matched4'];//displaying session message
    unset($_SESSION['pwd-not-matched4']);//removing session message after one time

}
if(isset($_SESSION['changer-mdp4']))
{
    echo $_SESSION['changer-mdp4'];//displaying session message
    unset($_SESSION['changer-mdp4']);//removing session message after one time

}


?>

<br><br>
<!-- bouton pour ajouter les admins -->
<a href="add-chef.php" class="btn-primary">
    Add chef
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
$sql= "SELECT * FROM tbl_chef";
//execute
$res= mysqli_query($conn, $sql);
//check whther the query is executing or not
if($res==TRUE)
{
    //count rows
    $count=mysqli_num_rows($res);
    $num=1;//var bach mattetkhalatch fel display te3 id_chef
    //check the num of rows
    if($count>0)
    {
        //we have dbb
        while($rows=mysqli_fetch_assoc($res))
        {
          //get all data
          //get individual data
          $id_chef=$rows['id_chef'];
          $full_name=$rows['full_name'];
          $username=$rows['username'];
          //display in table
         ?>

<tr>
                <td><?php echo $num++;?></td>
                <td><?php echo $full_name;?></td>
                <td><?php echo $username?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/update-password4.php?id_chef=<?php echo $id_chef; ?>" class="btn-primary">Changer mot de passe</a>
                    <a href="<?php echo SITEURL; ?>admin/update-chef.php?id_chef=<?php echo $id_chef; ?>" class="btn-secondary">M.à.j chef</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-chef.php?id_chef=<?php echo $id_chef; ?>" class="btn-supp">Supprimer chef</a>
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