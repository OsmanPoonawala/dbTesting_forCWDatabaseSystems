<?php require_once('../private/initialise.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php
    $rawItems = getItems();

    $deleteID = $_GET["delete"] ?? '';
    if (isset($_GET["delete"])) {
        deleteItem($deleteID);
        header('Location: items.php');
    }
?>


<table>
    <tr>
        <th>Item Number</th>
        <th>Description</th>
        <th>Weight</th>
        <th>Price</th>
    </tr>

    <?php
        while ($items = mysqli_fetch_assoc($rawItems)) {

            echo "<tr><td><a href=?delete=" . $items["ID"] . " onclick=\"return confirm('Are you sure that you want to delete this user?');\">" . $items["itemNumber"] . "</a></td>
            <td>" . $items["description"] . "</td>
            <td>" . $items["weight"] . "</td>
            <td>" . $items["price"] . "</td></tr>";
        }
    ?>
</table>
<br />
<a href="<?php echo "addItem.php" ?>">Add Item</a>


<?php include(SHARED_PATH . '/footer.php'); ?>
