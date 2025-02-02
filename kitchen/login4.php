<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
    </head>
    <body>
        <div class="container">
            <?php
            if(isset($_SESSION['login4'])) {
                echo $_SESSION['login4'];
                unset($_SESSION['login4']);
            }
          

            ?>
            <form action="" method="POST" class="text-center">
                <h2 class="text-center">Login</h2><br>
                Nom d'utilisateur:
                <input type="text" name="username" required><br><br>
                Mot de passe:
                <input type="password" name="password" required><br><br>
                <button type="submit" name="submit" value="Login">Se connecter</button>
            </form>
        </div>
    </body>
</html>

<?php
// check if the submit button is clicked
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    // vérifier si l'utilisateur existe
    $sql = "SELECT * FROM tbl_chef WHERE username ='$username' AND password='$password' ";
    $res = mysqli_query($conn, $sql);
    // compter le nombre de lignes retournées
    $count = mysqli_num_rows($res);
    if($count == 1) {
        $_SESSION['login4'] = "<div class='success'> Connecté avec succès </div>";
       
       $_SESSION['user4'] = $username;//check user is loged in or not and logout will unset it
       
        header('location:'.SITEURL.'kitchen/index.php');
    } else {
        $_SESSION['login4'] = "<div class='error text-center'>Échec de connexion. Nom d'utilisateur ou mot de passe incorrect.</div>";
        // redirection vers la page de login
        header('location:'.SITEURL.'kitchen/login4.php');
    }
}
?>
