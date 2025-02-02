
<?php 

    include('../config/constants.php');
include('menu.php');
    
   
    
?>


    <!-- main  section -->
    <div class="main-content">
        <div class="wrapper">
           <h1>Gérer LES COMMANDES</h1>
           <br>
<br>



<br><br>
<!-- bouton pour ajouter les admins -->
<br><br>
<table class="tbl-full">
            <thead>
                <tr>
                    <th>ID de la commande</th>
                    <th>Total de la commande (DA)</th>
                    <th>Numéro de la table</th>
                    <th>Date de la commande</th>
                    <th>Plats de la commande</th>
                    
                    
                    
                </tr>
            </thead>
            <tbody>  
              <!-- java vas ajouter les lignes de commnde -->
            </tbody>
        </table>
       
            
        </div>
       
    </div>
    <!-- main section -->

    <?php include('../admin/partials/pied.php')?>
    

    <script>
    var readyOrders = []; // stocker les commandes "reaady"

function isToday(dateString) {
  var today = new Date();
  var date = new Date(dateString);
  return (
    date.getFullYear() === today.getFullYear() &&
    date.getMonth() === today.getMonth() &&
    date.getDate() === today.getDate()
  );
}

function fetchOrders() {
  // Create a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Open a GET request to the PHP script
  xhr.open('GET', 'get_orders.php', true);

  // Handle the response
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      var orders = JSON.parse(xhr.responseText);
      var tableBody = document.querySelector('.tbl-full tbody');
      tableBody.innerHTML = '';
        // Vider le contenu du tableau à chaque appel
      for (var orderId in orders) {
        var order = orders[orderId];

        // virifier si la commande est pour aujourd'hui et  statut!="ready"
        if (!isToday(order.created_at) || readyOrders.includes(order.id_order)) {
          continue; // Ignorer cette commande
        }

        // Créer la ligne de la commande
        var row = document.createElement('tr');
        row.innerHTML =
          '<td>' +
          order.id_order +
          '</td>' +
          '<td>' +
          order.total +
          '</td>' +
          '<td>' +
          order.number +
          '</td>' +
          '<td>' +
          order.created_at +
          '</td>';
        var itemsCell = document.createElement('td');
        var itemsList = document.createElement('ul');

        if (order.items && order.items.length > 0) {
          order.items.forEach(function(item) {
            var itemLi = document.createElement('li');
            itemLi.textContent =
              item.food + ' (Qté: ' + item.qty + ', Prix: ' + item.price + ')';
            itemsList.appendChild(itemLi);
            tableBody.appendChild(row);
          });
        } else {
          itemsList.textContent = 'Aucun plat';
        }

        itemsCell.appendChild(itemsList);
        row.appendChild(itemsCell);

        // Ajouter une cellule pour le bouton "Ready"
        var readyCell = document.createElement('td');
        var readyButton = document.createElement('button');
        readyButton.textContent = 'Ready';
        readyButton.classList.add('ready-btn');
        readyButton.dataset.orderId = order.id_order;
        readyCell.appendChild(readyButton);
        row.appendChild(readyCell);

        tableBody.appendChild(row);
      }

      // Add an event listener for the "Ready" button clicks
      var readyButtons = document.querySelectorAll('.ready-btn');
      readyButtons.forEach(function(button) {
        button.addEventListener('click', function() {
          var orderId = this.dataset.orderId;
          // Add the order ID to the readyOrders array
          readyOrders.push(orderId);
          // Remove the order row from the table
          var row = this.parentNode.parentNode;
          row.parentNode.removeChild(row);
          // You can perform additional actions here, such as updating the database
          // or sending a request to the server to mark the order as ready
        });
      });
    }
  };

  // Send the request
  xhr.send();
}


// y'appeler lla fonction fetch apres 2sec
setInterval(fetchOrders, 2000);

</script>