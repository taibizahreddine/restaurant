<?php 
include('../config/constants.php');
//echo "delete food";
// check
if(isset($_GET['id_food']) AND isset($_GET['image_name']))
{
    //process delete
//echo "process delete";
//1.get id_food and image name
$id_food = $_GET['id_food'];

$image_name = $_GET['image_name'];

//2. remove the image
if($image_name != "")
{
    //remmove image from folder
    $path = "../images/food/".$image_name;
    //remove image file from folder
    $remove = unlink($path);

    if($remove == FALSE)
    {
        //failed to remove image
        $_SESSION['upload'] = "<div class='error'>image file delete failed</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
        die();
      
    }


}

//3. delete food

$sql = "DELETE FROM tbl_food WHERE id_food=$id_food";

$res = mysqli_query($conn, $sql);

//4. redirect to manage-food
if($res == TRUE){
    //food deleted
    $_SESSION['delete'] = "<div class='success'>image file deleted with success</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
 
}
else{
    $_SESSION['delete'] = "<div class='error'>food delete failed</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
 
}



}
else{
    //redirect to manage food

//echo "redirect";
$_SESSION['unauthorize'] = "<div class='error'>Unauthorized to delete</div>";
header('location:'.SITEURL.'admin/manage-food.php');

}


?>