<?php require_once('../private/initialise.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $itemNumber = $_POST["itemNumber"];
        $customerID = $_GET['id'];
        $quantity = $_POST["quantity"];
        
        $order = addOrder($itemNumber, $customerID, $quantity);
        redirect_to(url_for('orders.php?id=' . $customerID));
    }
?>

<form method="post" >
    <input type="text" name="itemNumber" placeholder="Item Number">
    <input type="text" name="quantity" placeholder="Quantity">
    <button name="submit">Add</button>
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>
