<?php 
include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change password</h1>
        <br><br>


        <?php
        if(isset($_GET['id_chef']))
        {
           $id_chef =$_GET['id_chef'];
        }
      
        
        
        ?>


<form action="" method="POST">

<table class="tbl-30">
    <tr>
        <td> Mot de passe courrant:</td>
        <td>
            <input type="password" name="mot_de_passe_courrant" placeholder=" mot de pass courrant" required>
        </td>
    </tr>
    <tr>
        <td>Nouveau mot de passe:</td>
        <td>
            <input type="password" name="nouveau_mot_de_passe" placeholder="nouveau mot de passe" required>
        </td>
    </tr>
    <tr>
        <td>Confirmer le mot de passe:</td>
        <td>
            <input type="password" name="confirmer" placeholder="confirmer mot de passe"  required>
        </td>
    </tr>

     <tr>
        <td colpan="2">
        <input type="hidden" name="id_chef" value="<?php echo $id_chef;?>">
       
            <input type="submit" name="submit" value="changer mot de passe" class="btn-secondary">
        </td>
     </tr>
</table>


</form>


    </div>
</div>

<?php
   //check submit work or not
   if(isset($_POST['submit']))
   {
   // echo "clicked";

   //1.get data from form
   $id_chef=$_POST['id_chef'];
   $mot_de_passe_courrant=md5($_POST['mot_de_passe_courrant']);
   $nouveau_mot_de_passe=md5($_POST['nouveau_mot_de_passe']);
   $confirmer=md5($_POST['confirmer']);
   //2. check the user with current id_chef and password exist (i can take off this etape if negle3 current password nkhali ghir new w confirm)
$sql= "SELECT * FROM tbl_chef WHERE id_chef=$id_chef AND password='$mot_de_passe_courrant'"  ;
//execute
$res = mysqli_query($conn, $sql);//-------------------------------------------------------------------------------
if($res==TRUE)
{
    //check data available or not
    $count=mysqli_num_rows($res);
    if($count==1)
    {
        //user exist
//echo "user found";
//new and confirmer match or not
if($nouveau_mot_de_passe==$confirmer){
    //update
    //echo "password match";
    $sql2 = "UPDATE tbl_chef SET password='$nouveau_mot_de_passe' WHERE id_chef=$id_chef";
    $res2 = mysqli_query($conn, $sql2);
    if($res2==TRUE)
    {
        $_SESSION['changer-pw4']="le mot de psse a été modifier avec successé";
        header('location:'.SITEURL.'admin/manage-chef.php');
       
    }
    else{
        //dislpay error
        $_SESSION['changer-pw4']="<div class='error'>erreur lors du changement du mot de passe</div>";
        header('location:'.SITEURL.'admin/manage-chef.php');
       
    }
}
else{
    //redirect to manage with error
    $_SESSION['pwd-notmatched4']="<div class='error'>matcher ton mot de passe avec le confirmer</div>";
    header('location:'.SITEURL.'admin/manage-chef.php');
   
}
    }
    else {
        //user doesn't exist
        $_SESSION['user-notfound4']="<div class='error'>user not found</div>";
        header('location:'.SITEURL.'admin/manage-chef.php');
        
    }
}//-----------------------------------------------------------------------------------------------------------------------------------

   //3. check if new password and confirm password match ornot
   //4.change passwor if all above is true
   }

?>



<?php 
include('partials/pied.php')?>