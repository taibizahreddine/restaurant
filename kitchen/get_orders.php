<?php
include('../config/constants.php');

// Query to fetch orders
$sql = "SELECT o.id_order,o.total,o.number,o.created_at,oi.food,oi.price,oi.qty FROM tbl_order o JOIN tbl_order_items oi ON o.id_order = oi.order_id WHERE o.status != 'ready'";
$result = mysqli_query($conn, $sql);

// Initialize an empty array to store order data
$orders = array();
while ($row = mysqli_fetch_assoc($result)) {
    $orderId = $row['id_order'];
    if (!isset($orders[$orderId])) {
        $orders[$orderId] = array(
            'id_order' => $row['id_order'],
            'total' => $row['total'],
            'number' => $row['number'],
            'created_at' => $row['created_at'],
            'items' => array()
        );
    }
    $orders[$orderId]['items'][] = array(
        'food' => $row['food'],
        'price' => $row['price'],
        'qty' => $row['qty']
    );
}

// Return the order data as JSON
echo json_encode($orders);
?>