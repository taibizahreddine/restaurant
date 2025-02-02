<?php 
    // Vérifier si l'utilisateur est connecté
    include('../config/constants.php');
 
    
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- important for responsivitity-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiter page</title>
<style>
    /* 
gestion de restaurent mais d'autre façon;
anahouwa;
23/24;
rak fahem;


*/
/* css for all */
*{
    margin: 0 0;
    padding: 0 0;
    font-family: Arial, Helvetica, sans-serif;
}

.disabled {
    pointer-events: none;
    cursor: not-allowed;
}
/* la class qui ne permet pas au serveur d'acceder a latable accuper */

.container{
  
    width: 80%;
    margin: 0 auto;  /* raha mka7za la page à droit*/
    padding: 1%;
   
}


.text-right{
    text-align: right;
}

.text-center{
    text-align: center;
}

.effacement{
    clear: both;
float: none;
}

a{
    color:black;
    text-decoration: none;
}
a:hover{
    color: rgb(76, 72, 72);
}
.btn{
    padding: 1%;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
    
}
.btn-premier{
    background-color: black;
    color: white;
    cursor: pointer;
}
.btn-premier:hover{
    color: white;
    background-color:  rgb(76, 72, 72);
}

h2{
    color:#2f3542;
    font-size: 2rem;
    margin-bottom: 2%;
}

h3{
    font-size: 1.5rem;
}
.float-container{
    position: relative;
}

.float-text{
    position: absolute;
    bottom: 50px;
    left: 37%;
}


/* css bdn section */

.menu{
    line-height: 60px;
}

.menu  ul{
list-style-type: none;
}

.menu ul li{
    display: inline;
    padding: 1%;
    font-weight: bold;
}



 
    h2{
        margin-bottom:10%  ;
    }

 

@media only screen and (max-width:768px){
    .logo{
        width: 100%;
        float:none;
        margin: 1% 3%;
    }
    .menu ul{
        text-align: center;
    }

  
   
    .box-3{
        width: 90%;
        margin: 4% auto;
    }
   

    }









/* its me again hhh */






*{
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
}
.wrapper{
  
    padding: 1%;
    width: 80%;
    margin: 0 auto;
}
.text-center{
    text-align: center;
}
.effacement{
    float: none;
    clear: both;
}

.tbl-full{
    width: 100%;
}

.tbl-30{
    width: 30%;
    /* margin: 5% auto;   ------------------------------------------------------------------------------mbe3d nwelilha */
}



 .menu ul{
    list-style-type: none;
 }
 .menu ul li{
    display: inline;
    padding: 1%;
 }

 .menu ul li a{
    text-decoration: none;
    color: black;
    font-weight: bold;
 }
 .menu ul li a:hover{
    color: rgb(76, 72, 72);
 }

/* main content css */
.main-content{
   background-color:white ;
   padding: 3% 0;
}
.col-4{
    width: 18%;
    background-color: grey;
    margin: 1%;
    padding: 2%;
    float: left;
    
}


/* pied de page css */

/* css for login */
.login{
    border: 1px solid grey;
    width: 30%;
    margin: 10% auto;
    padding: 2% 2%;
}
</style>
</head>
<body>
    
    <!-- barre de recherche "bdn" section -->
    <section class="bdn">
        <div class="container">
          <!-- logo here -->
           <div class="menu text-center">
            <!-- text-right -->
            <ul>
                <li>
                    <a href="index2.php">home</a>
                </li>
                
                <li>
                    <a href="logout2.php">Deconnecter</a>
                </li>
            </ul>
           </div>

<div class="effacement"></div>

    <!-- main content section -->
    <div class="main-content">
        <div class="wrapper ">
           <h1 class="text-center">Les Tables</h1>
           
<br><br>
<?php
            if(isset($_SESSION['login2']))
            {
                echo $_SESSION['login2'];
                unset($_SESSION['login2']);
            }
           
            
            $sql = "SELECT number, status FROM tbl_table ";
            $result = mysqli_query($conn, $sql);
            
    
            if(mysqli_num_rows($result) > 0) {
            
                while($row = mysqli_fetch_assoc($result)) {
                    $number = $row['number'];
                    $status = $row['status'];
                    
                   
                    $bgColor = ($status == 'available') ? 'green' : 'red';
                    
                    echo '<a href="../foods.php?table_number=' . $number . '" class="' . ($status == 'occupied' ? 'disabled' : '') . '">';
                    // class disabeled to prevent the witer to access to a table that is occupied
                    echo '<div class="col-4 text-center" style="background-color: ' . $bgColor . ';">';
                    echo $number;
                    echo '</div>';
                    echo '</a>';
                }
            } else {
                echo "Aucune table trouvée.";
            }
        
            mysqli_close($conn);
            ?>

        <div class="effacement"></div>
            
        </div>
       
    </div>
    <!-- main content section -->

   
</body>
</html>