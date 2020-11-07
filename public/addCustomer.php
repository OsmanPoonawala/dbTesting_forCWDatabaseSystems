<?php require_once('../private/initialise.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $fullName = $_POST["fullName"];
        $address = $_POST["address"];
        
        $customer = addCustomer($fullName, $address);
        redirect_to(url_for('customers.php'));
    }
?>
<form method="post" >
    <input type="text" name="fullName" placeholder="Full Name">
    <input type="text" name="address" placeholder="Address">
    <button name="submit">Add</button>
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>
