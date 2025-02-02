<?php 
   
    include('../config/constants.php');
    include('menu.php');
    
  
    
?>



<!DOCTYPE html>
<html>
<head>
    <title>Caissier - Commandes du jour</title>
    <script src="../js/jquery.min.js"></script></head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h1>Commandes du jour</h1>
            <br>
<br>



<br><br>
<!-- bouton pour ajouter les admins -->
<br><br>
            
<?php
            if(isset($_SESSION['login3']))
            {
                echo $_SESSION['login3'];
                unset($_SESSION['login3']);
            }?>
            <table class="tbl-full">
                <thead>
                    <tr>
                        <th>ID de la commande</th>
                        <th>Total (DA)</th>
                        <th>Numéro de table</th>
                        <th>Date de la commande</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="order-table-body"> <!-- Emplacement pour les données des commandes -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Fonction pour récupérer les commandes
        function fetchOrders() {
            $.ajax({
                url: 'get_orders.php', // Chemin vers le script PHP qui récupère les commandes
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Effacer le contenu actuel du tableau
                    $('#order-table-body').empty();

                    // Parcourir les données des commandes et les ajouter au tableau
                    data.forEach(function(order) {
                        $('#order-table-body').append(
                            '<tr>' +
                            '<td>' + order.id_order + '</td>' +
                            '<td>' + order.total + '</td>' +
                            '<td>' + order.number + '</td>' +
                            '<td>' + order.created_at + '</td>' +
                            '<td>' +
                            '<form method="post" action="valider_order.php">' +
                            '<input type="hidden" name="order_id" value="' + order.id_order + '">' +
                            '<input type="hidden" name="table_number" value="' + order.number + '">' +
                            '<input type="submit" name="validate" value="Valider la commande">' +
                            '</form>' +
                            '</td>' +
                            '</tr>'
                        );
                    });
                }
            });
        }

        // Appeler la fonction pour récupérer les commandes
        setInterval(fetchOrders, 2000); 
    </script>
</body>
</html>
