<?php  include('partials/menu.php')?>
    <!-- main content section -->
    <div class="main-content">
        <div class="wrapper text-center">
           <h1>Welcome ADMIN</h1>
           <br><br>

           <?php
           if(isset($_SESSION['login']))
           {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
           }
           
           
           ?>
<br><br>

       <!-- dashboard here -->
    <!-- main content section -->

   <?php include('partials/pied.php')?>