<?php

require 'config.php';

if (isset($_POST['update'])) {
    $customer_id = $_POST['customer_id'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $phone_number = $_POST['pnumber'];

    // UPDATE CUSTOMER
    $stmt = $pdo->prepare("UPDATE customers SET first_name = ?, last_name = ?, phone_number = ? WHERE customer_id = ?");
    $stmt->execute([$first_name, $last_name, $phone_number, $customer_id]);

    // UPDATE ORDERS

    echo "Customer Info updated successfully!";
}
?>