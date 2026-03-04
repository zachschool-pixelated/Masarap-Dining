<?php

require 'config.php';

if (isset($_POST['add'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pnumber = $_POST['pnumber'];

    //INSERT INTO CUSTOMERS
    $stmt = $pdo->prepare("INSERT INTO customers (first_name, last_name, phone_number) VALUES (?, ?, ?)");
    $stmt->execute([$fname, $lname, $pnumber]);

    // // GET THE LAST INSERTED USER_ID
    // $customer_id = $pdo->lastInsertId();

    // $stmt = $pdo->prepare("INSERT INTO orders (users_id, product, amount) VALUES (?, ?, ?)");
    // $stmt->execute([$users_id, $product, $amount]);

    echo "User and Order inserted successfully!";

}
?>