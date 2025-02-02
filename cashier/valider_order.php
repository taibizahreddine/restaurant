<?php
include('../config/constants.php');

if (isset($_POST['validate'])) {
    $orderId = $_POST['order_id'];
    $tableNumber = $_POST['table_number'];

    // Mettre à jour le statut de la commande à 'ready'
    $sql = "UPDATE tbl_order SET status = 'ready' WHERE id_order = $orderId";
    mysqli_query($conn, $sql);

    // Mettre à jour le statut de la table à 'available'
    $sql = "UPDATE tbl_table SET status = 'available' WHERE number = $tableNumber";
    mysqli_query($conn, $sql);

    // Rediriger vers la page du caissier après la mise à jour
    header("Location: index.php");
    exit;
}
?>