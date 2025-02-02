<?php
include('../config/constants.php');

// Récupérer les commandes de la journée
$currentDate = date('Y-m-d');
$sql = "SELECT id_order, total, number, created_at FROM tbl_order WHERE DATE(created_at) = '$currentDate' AND status != 'ready'";
$result = mysqli_query($conn, $sql);

// tcreer tableau pour stocker 
$orders = array();

// ajouter les rsultas l'tableau
while ($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
}
mysqli_close($conn);
echo json_encode($orders);
?>
