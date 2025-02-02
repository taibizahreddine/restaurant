<?php 
include('partials/menu.php'); 

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

   
    $sql = "INSERT INTO tbl_chef (full_name, username, password) VALUES ('$full_name', '$username', '$password')";

    // Execute query and save data in database
    $res = mysqli_query($conn, $sql);

    // Check if data is inserted and display appropriate message
    if ($res == TRUE) {
        
        $_SESSION['add-chef'] = "Chef added successfully";
   
        header("Location: " . SITEURL . 'admin/manage-chef.php');
    } else {
     
        $_SESSION['add-chef'] = "Failed to add chef";
     
        header("Location: " . SITEURL . 'admin/add-chef.php');
    }

    
    exit();
}

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Chef</h1>
        <br><br>

        <?php 
        if (isset($_SESSION['add-chef'])) { 
            echo $_SESSION['add-chef']; 
            unset($_SESSION['add-chef']);  
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30"> 
                <tr>
                    <td>Nom/Prenom:</td>
                    <td><input type="text" name="full_name" placeholder="Entrez votre nom complet" required></td>
                </tr>
                <tr>
                    <td>Nom d'utilisateur</td>
                    <td><input type="text" name="username" placeholder="Entrez votre pseudo" required></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input type="password" name="password" placeholder="Entrez votre mot de passe" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Chef" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('../admin/partials/pied.php'); ?>
