<?php 

include('../config/constants.php');




?>

<html>
<head>
<title>
   Admin page
</title>
<style>
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



table tr th{
    border-bottom:1px solid black ;
    padding: 1%;
    text-align: left;
}
table tr td{
    padding: 1%;
}

.btn-primary{
    
padding: 1%;
font-weight: bold;
color: rgb(111, 25, 94);

}

.btn-secondary{
    
    padding: 1%;
    font-weight: bold;
    color: rgb(96, 147, 62);
    
    }
    .btn-supp{
    
        padding: 1%;
        font-weight: bold;
        color: rgb(201, 64, 64);
        
        }
        .success{
            color: rgb(65, 165, 65);
        }
        .error{
            color: red;
        }
    


/* menu css
 */
 .menu{
    border-bottom: 1px solid black;
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

.pied{
    background-color: black;
    color: white;
}
.pied  a{
     color: rgb(219, 214, 207);
}

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
    <!-- menu section -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <!-- <li>
                    <a href="index.php">Home</a>
                </li> -->
                <li>
                    <a href="manage-admin.php">Admin </a>
                </li>
                <li>
                    <a href="manage-serveur.php">waiter </a>
                </li>
                <li>
                    <a href="manage-cashier.php">cashier </a>
                </li>
                <li>
                    <a href="manage-chef.php">chef </a>
                </li>
                <li>
                    <a href="manage-table.php">Tables</a>
                </li>
                <li>
                    <a href="manage-food.php">Food</a>
                </li>
               
                <li>
                    <a href="logout.php">Deconnecter</a>
                </li>
            </ul>

        </div>
       
    </div>
    <!-- menu section -->

