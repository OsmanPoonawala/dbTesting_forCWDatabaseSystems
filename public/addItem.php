<?php require_once('../private/initialise.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $itemNumber = $_POST["itemNumber"];
        $description = $_POST["description"];
        $weight = $_POST["weight"];
        $price = $_POST["price"];
        
        $item = addItem($itemNumber, $description, $weight, $price);
        redirect_to(url_for('items.php'));
    }
?>

<form method="post" >
    <input type="text" name="itemNumber" placeholder="Item Number">
    <input type="text" name="description" placeholder="Description">
    <input type="text" name="weight" placeholder="Weight">
    <input type="text" name="price" placeholder="Price">
    <button name="submit">Add</button>
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>
