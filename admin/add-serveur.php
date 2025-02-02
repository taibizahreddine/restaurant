<?php

include('partials/menu.php');
include('../admin/partials/pied.php');

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get form data
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); 

    
    $sql = "INSERT INTO tbl_serveur (full_name, username, password) VALUES ('$full_name', '$username', '$password')";

    // Execute
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    // Check if data is inserted successfully
    if($res) {
        $_SESSION['add-ser'] = "Server added successfully";
        header("location: ".SITEURL.'admin/manage-serveur.php');
        exit;
    } else {
        $_SESSION['add-ser'] = "Failed to add server";
        header("location: ".SITEURL.'admin/add-serveur.php');
        exit; 
    }
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Server</h1>
        <br><br>

        <?php 
       
        if(isset($_SESSION['add-ser'])) {
            echo $_SESSION['add-ser'];
            unset($_SESSION['add-ser']);
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
                        <input type="submit" name="submit" value="Add Server" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
