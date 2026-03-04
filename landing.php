<?php

require 'insert.php';
require 'update.php';
require 'delete.php';
require 'select.php';

?>
<h2>Simple PDO CRUD</h2>
<?php

// CHECK IF EDIT MODE
$editCustomer = null;

if (isset($_GET['edit'])) {
  $customer_id = $_GET['edit'];
  $stmt = $pdo->prepare("SELECT * FROM customers WHERE customer_id = ?");
  $stmt->execute([$customer_id]);
  $editCustomer = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<h3><?= $editCustomer ? 'Update Customer' : 'Add Customer' ?></h3>

<form method="POST">
    <?php if (!empty($editCustomer)): ?>
    <input type="hidden" name="customer_id" value="<?= $editCustomer['customer_id'] ?>">
  <?php endif; ?>

  <label>First Name:</label>
  <input type="text" name="fname" value="<?= !empty($editCustomer) ? $editCustomer['first_name'] : '' ?>" required><br>
  
  <label>Last Name:</label>
  <input type="text" name="lname" value="<?= !empty($editCustomer) ? $editCustomer['last_name'] : '' ?>" required><br>

  <label>Phone Number:</label>
  <input type="text" name="pnumber" value="<?= !empty($editCustomer) ? $editCustomer['phone_number'] : '' ?>" required><br>
  

  <!-- Submit buttons -->
  <?php if (!empty($editCustomer)): ?>
    <button type="submit" name="update">Update</button>
    <a href="landing.php">Cancel</a>
  <?php else: ?>
    <button type="submit" name="add">Add</button>
  <?php endif; ?>

</form>

<hr>

<!-- USER TABLE -->

<h3>Customer List</h3>

<table border="1" cellpadding="10">

  <tr>
    <th>customer_id</th>
    <th>First name</th>
    <th>Last Name</th>
    <th>Phone Number</th>
    <th>Actions</th>
  </tr>

  <?php foreach ($customers as $customer): ?>

  <tr>
    <td><?= $customer['customer_id'] ?></td>
    <td><?= $customer['first_name'] ?></td>
    <td><?= $customer['last_name'] ?></td>
    <td><?= $customer['phone_number'] ?></td>

    <td>
      <a href="?edit=<?= $customer['customer_id'] ?>">Edit</a> |
      <a href="?delete=<?= $customer['customer_id'] ?>">Delete</a>
    </td>

  </tr>

  <?php endforeach; ?>

</table>