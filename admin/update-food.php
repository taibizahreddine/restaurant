<?php
include('partials/menu.php');

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//check id_food set or not
if (isset($_GET['id_food'])) {
    $id_food = $_GET['id_food'];
    //sql query to get infos
    $sql = "SELECT * FROM tbl_food WHERE id_food=$id_food";

    $res = mysqli_query($conn, $sql);
    //get the value based on query
    $row = mysqli_fetch_assoc($res);
    //get the values
    $title = $row['title'];
    $description = $row['description'];
    $price = $row['price'];
    $current_image = $row['image_name'];
    $featured = $row['featured'];
    $active = $row['active'];
} else {
    //redirect to manage food
    $_SESSION['no-food-found'] = "<div class='error'>No food found.</div>";
    header('Location: ' . SITEURL . 'admin/manage-food.php');
    exit();
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    //1  echo "bouton a été clické";
    $id_food = $_POST['id_food'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    //2get details from form

    //pload button clicked or not
    //3upload image
    //4remove image if new image uploaded
    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        //file available or not
        if ($image_name != "") {
            $image_name_parts = explode('.', $image_name);
            $ext = end($image_name_parts);
            $image_name = "Food-Name-" . rand(0000, 9999) . '.' . $ext; //rename image
            //get the source and destination path
            $src_path = $_FILES['image']['tmp_name'];
            $dest_path = "../images/food/" . $image_name;

            //upload the image
            $upload = move_uploaded_file($src_path, $dest_path);
            //check if image uploaded or not
            if ($upload == FALSE) {
                //failed
                $_SESSION['upload'] = "<div class='error'>Failed to upload image!</div>";
                header('Location: ' . SITEURL . 'admin/manage-food.php');
                exit();
            }
            //remove current image if available
            if ($current_image != "") {
                //available
                //remove
                $remove_path = "../images/food/" . $current_image;
                $remove = unlink($remove_path);
                //check if the image is removed or not
                if ($remove == FALSE) {
                    //failed
                    $_SESSION['remove-failed'] = "<div class='error'>Failed to remove image!</div>";
                    header('Location: ' . SITEURL . 'admin/manage-food.php');
                    exit();
                }
            }
        } else {
            $image_name = $current_image; //default when not selected
        }
    } else {
        $image_name = $current_image; //image when button not clicked
    }

    //5update food in db
    $sql3 = "UPDATE tbl_food SET
    title= '$title',
    description = '$description',
    price= '$price',
    image_name = '$image_name',
    featured= '$featured',
    active = '$active'
    WHERE id_food=$id_food";
    //execute query
    $res3 = mysqli_query($conn, $sql3);

    if ($res3 == TRUE) {
        $_SESSION['update'] = "<div class='success'>Food updated successfully</div>";
        header('Location: ' . SITEURL . 'admin/manage-food.php');
        exit();
    } else {
        $_SESSION['update'] = "<div class='error'>Failed to update food!</div>";
        header('Location: ' . SITEURL . 'admin/manage-food.php');
        exit();
    }
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>
Copy code    <?php
    if (isset($_SESSION['no-food-found'])) {
        echo $_SESSION['no-food-found'];
        unset($_SESSION['no-food-found']);
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" value="<?php echo $title ?>" required>
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    <textarea name="description" cols="30" rows="3"><?php echo $description ?></textarea>
                </td>
            </tr>
            <tr>
                <td>>Price:</td>
                <td>
                    <input type="number" name="price" value="<?php echo $price ?>" required>
                </td>
            </tr>
            <tr>
                <td>Current Image:</td>
                <td>
                    <?php
                    if ($current_image != "") {
                        ?>
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" alt="<?php echo $title; ?>" width="150px">
                        <?php
                    } else {
                        echo "<div class='error'>No image available for this food item.</div>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Select New Image</td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td>Featured:</td>
                <td>
                    <input <?php if ($featured == "Yes") {
                        echo "checked";
                    } ?> type="radio" name="featured" value="Yes"> Yes
                    <input <?php if ($featured == "No") {
                        echo "checked";
                    } ?> type="radio" name="featured" value="No"> No
                </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                    <input <?php if ($active == "Yes") {
                        echo "checked";
                    } ?> type="radio" name="active" value="Yes"> Yes
                    <input <?php if ($active == "No") {
                        echo "checked";
                    } ?> type="radio" name="active" value="No"> No
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id_food" value="<?php echo $id_food; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                </td>
            </tr>
        </table>
    </form>
</div>
</div>
<?php
include('partials/pied.php');
?>