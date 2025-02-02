<?php 
include('partials/menu.php');

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // 1. Get data from form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $featured = isset($_POST['featured']) ? $_POST['featured'] : "No";

   
    $active = isset($_POST['active']) ? $_POST['active'] : "No";

    // 2. upload image if selected
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
    
        $image_name = $_FILES['image']['name'];

        // A.renomer l'image
        $ext = pathinfo($image_name, PATHINFO_EXTENSION); 
        $image_name = "Food-Name-" . rand(0000, 9999) . "." . $ext; // New image name

        // B. Upload
      
        $src = $_FILES['image']['tmp_name'];
        $dst = "../images/food/" . $image_name;

       //uploadt he image 
        $upload = move_uploaded_file($src, $dst);

        // Checker if uploaded
        if ($upload == false) {
            $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
            header('Location: ' . SITEURL . 'admin/add-food.php');
            exit();
        }
    } else {
        $image_name = ""; // Default value as blank
    }

    // 3. Insert into database
    //  add food
    $sql2 = "INSERT INTO tbl_food SET
        title = '$title',
        description = '$description',
        price = $price,
        image_name = '$image_name',
        featured = '$featured',
        active = '$active'
    ";

    // Execute 
    $res2 = mysqli_query($conn, $sql2);

  
    if ($res2 == true) {
       
        $_SESSION['add'] = "<div class='success'>Food added successfully</div>";
        header('Location: ' . SITEURL . 'admin/manage-food.php');
    } else {
       
        $_SESSION['add'] = "<div class='error'>Failed to add food</div>";
        header('Location: ' . SITEURL . 'admin/manage-food.php');
    }

    exit();
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>

        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" required>
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="3"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" required>
                    </td>
                </tr>
                <tr>
                    <td>Select image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/pied.php'); ?>
