<?php
// Start session


// Include necessary files
include('partials/menu.php');

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get form data
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Encrypt password with MD5

    // SQL query to insert data into the database
    $sql = "INSERT INTO tbl_cashier (full_name, username, password) VALUES ('$full_name', '$username', '$password')";

    // Execute query
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    // Check if data is inserted successfully
    if($res) {
        $_SESSION['add-cash'] = "Cashier added successfully";
        header("location: ".SITEURL.'admin/manage-cashier.php');
        exit; // Stop further execution
    } else {
        $_SESSION['add-cash'] = "Failed to add cashier";
        header("location: ".SITEURL.'admin/add-cashier.php');
        exit; // Stop further execution
    }
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Cashier</h1>
        <br><br>

        <?php 
        // Display session message if set
        if(isset($_SESSION['add-cash'])) {
            echo $_SESSION['add-cash'];
            unset($_SESSION['add-cash']); // Clear session
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
                        <input type="submit" name="submit" value="Add Cashier" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
