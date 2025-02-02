<?php  include('partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
<h1>Gérer les Plats</h1>
<br>
<br>
<!-- bouton pour ajouter les admins -->
<a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-primary">
    Add Food
</a><br><br>
<?php
         if(isset($_SESSION['add']))
         {
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
         }
         
        if(isset($_SESSION['delete']))
         {
            echo $_SESSION['delete'];
            unset ($_SESSION['delete']);
         }

         if(isset($_SESSION['upload']))
         {
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
         }
         

         if(isset($_SESSION['unauthorize']))
         {
            echo $_SESSION['unauthorize'];
            unset ($_SESSION['unauthorize']);
         }
         if(isset($_SESSION['update']))
         {
            echo $_SESSION['update'];
            unset ($_SESSION['update']);
         }
       
        
         ?>
           <table class="tbl-full">
            <tr>
                <th>id_food</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
<?php 
//sql query to get data from db
$sql = "SELECT * FROM tbl_food";
//execute
$res = mysqli_query($conn, $sql);
//count rows
$count = mysqli_num_rows($res);
//create serial
$sn=1;
if($count>0)
{
    //we have food in db
    //get it noww and display it
    while($row=mysqli_fetch_assoc($res))
    {
        //get the value from individual columns
    $id_food = $row['id_food'];
    $title = $row['title'];
    $price = $row['price'];
    $image_name = $row['image_name'];
    $featured = $row['featured'];
    $active = $row['active'];
?>


            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $title; ?></td>
                <td><?php echo $price; ?>da</td>
                <td>
                    <?php 
                     
                    if($image_name=="")
                    {
                        echo "<div class='error'>image not added</div>";
                    }
                    {
                        //we have display
                        ?>
                        <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" width="100px">
                        <?php
                    }
                    ; ?>
                </td>
                <td><?php echo $featured; ?></td>
                <td><?php echo $active;?></td>
                <td>
                    <a href="<?php echo SITEURL;?>admin/update-food.php?id_food=<?php echo $id_food; ?>" class="btn-secondary">M.à.j du plat</a>
                    <a href="<?php echo SITEURL;?>admin/delete-food.php?id_food=<?php echo $id_food; ?>&image_name=<?php echo $image_name?>" class="btn-supp">Supprimer le plat</a>
                </td>
            </tr>

          
            




<?php

}

}
else{
    //no food in data base
    echo "<tr> <td colspan='7' class='error'>Food not added yet.</td></tr>";
}


?>




           </table>
</div>
</div>

<?php  include('partials/pied.php') ?>