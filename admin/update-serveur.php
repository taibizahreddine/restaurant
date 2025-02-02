<?php 

include('partials/menu.php')

?>

<div class="main-content">
    <div class="wrapper">
    <h1>Update Serveur</h1><br><br>

    <?php 
    //1.get the id_serveur of selected waiter
    $id_serveur=$_GET['id_serveur'];
    //2.sql query to get details
    $sql = "SELECT * FROM tbl_serveur WHERE id_serveur=$id_serveur";
    $res=mysqli_query($conn, $sql);
    //check the query
    if($res==TRUE){
        //data available
        $count = mysqli_num_rows($res);

        if($count==1){
            //get details
            //echo "waiter available";
            $row=mysqli_fetch_assoc($res);
            $full_name=$row['full_name'];
            $username=$row['username'];
        }
          else{
            header('location:'.SITEURL.'admin/manage-serveur.php');
          }
    }
    
    
    ?>

    <form action="" method="POST">
   <table class="tbl-30"> 
                <tr>
                    <td>Nom/Prenom:</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name;?>" required></td>
                </tr>
                <tr>
                    <td>Pseudo</td>
                    <td> <input type="text" name="username" value="<?php echo $username;?>" required></td>
                </tr>

                
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id_serveur" value="<?php echo $id_serveur;?>">
                        <input type="submit" name="submit" value="update serveur" class="btn-secondary">
                    </td>
                </tr>
            </table>
    </form>
</div>
</div>




<?php 

//botton clicked or not
if(isset($_POST['submit']))
{
    //echo "button clicked";
    //get all the value from form to update;
    $id_serveur = $_POST['id_serveur'];

    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    //sql query to update 

    $sql =  "UPDATE tbl_serveur SET full_name= '$full_name', username = '$username' WHERE id_serveur='$id_serveur'";


    $res =mysqli_query($conn,$sql);
    if($res==TRUE){
            $_SESSION['update-ser']="Waiter updated.";
            header('location:'.SITEURL.'admin/manage-serveur.php');
    }
    else{
        $_SESSION['update-ser']="<div class='error'>failed to update</div>";
        header('location:'.SITEURL.'admin/manage-serveur.php');

    }

}

?>






<?php 

include('partials/pied.php')

?>