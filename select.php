<?php
require 'config.php';

$stmt = $pdo->query('SELECT * FROM customers');
$customers = $stmt-> fetchAll(PDO::FETCH_ASSOC);

?>