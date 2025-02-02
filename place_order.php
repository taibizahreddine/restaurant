<?php
// Include the database configuration file
require_once 'config/constants.php';

// Check if the data has been sent
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the sent data
    $data = json_decode(file_get_contents('php://input'), true);
    $orderItems = $data['orderItems'];
    $tableNumber = $data['tableNumber'];

    // Calculate the total of the order
    $total = 0;
    foreach ($orderItems as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Prepare  SQL  to insert the order
        $stmt = $conn->prepare("INSERT INTO tbl_order (total, number) VALUES (?, ?)");
        $stmt->bind_param("ss", $total, $tableNumber);
        $stmt->execute();

        // get the id of the lest order inseré
        $orderId = $conn->insert_id;

        
        $itemStmt = $conn->prepare("INSERT INTO tbl_order_items (order_id, food, price, qty) VALUES (?, ?, ?, ?)");
        $itemStmt->bind_param("isss", $orderId, $food, $price, $qty);

        // insert the itemsof order into the table in database
        foreach ($orderItems as $item) {
            $food = $item['name'];
            $price = $item['price'];
            $qty = $item['quantity'];
            $itemStmt->execute();
        }

        // update the status of the table to 'occupied'
        $updateTableStmt = $conn->prepare("UPDATE tbl_table SET status = 'occupied' WHERE number = ?");
        $updateTableStmt->bind_param("s", $tableNumber);
        $updateTableStmt->execute();

        // close the transaction
        $conn->commit();
        $stmt->close();
        $itemStmt->close();
        $updateTableStmt->close();
        $conn->close();

        // rturn a json     response
        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        //if any problem undo any change
        $conn->rollback();
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
} else {
    // rreturn a json response in case the method is not post
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>