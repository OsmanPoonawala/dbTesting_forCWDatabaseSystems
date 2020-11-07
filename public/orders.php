<?php require_once('../private/initialise.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php
    $customerID = $_GET['id'];

    $rawOrders = getOrders($customerID);

    $deleteID = $_GET["delete"] ?? '';
    if (isset($_GET["delete"])) {
        $deleteID = deleteOrder($deleteID);
        header('Location: orders.php?id=' . $deleteID);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $deliveryDate = $_POST["deliveryDate"];
        $delivery = addDelivery($customerID, $deliveryDate);
        $deliveryID = mysqli_insert_id($db);
        while ($deliveries = mysqli_fetch_assoc($rawOrders)) {
            $deliveryIDCus = addDeliveryDetails($deliveryID, $deliveries["itemNumber"], $deliveries["quantity"]);
            $deleteOrd = deleteOrder($deliveries["ID"]);
        }
        header('Location: orders.php?id=' . $deleteOrd);
    }
?>

<h1>Customer ID: <?php echo $customerID ?></h1>
<table>
    <tr>
        <th>Item Number</th>
        <th>quantity</th>
        <th>startDate</th>
        <th>endDate</th>
    </tr>

    <?php
        while ($orders = mysqli_fetch_assoc($rawOrders)) {

            echo "<tr><td><a href=?delete=" . $orders["ID"] . " onclick=\"return confirm('Are you sure that you want to delete this user?');\">" . $orders["itemNumber"] . "</a></td>
            <td>" . $orders["quantity"] . "</td>
            <td>" . $orders["startDate"] . "</td>
            <td>" . $orders["endDate"] . "</td></tr>";
        }
    ?>
</table>
<br />

<a href="<?php echo "addOrder.php?id=" . $customerID ?>">Place Order</a>
<br />

<form method="post">
    <input type="date" name="deliveryDate" placeholder="Delivery Date">
    <button name="submit">Deliver Orders</button>
</form>
<br />

<?php include(SHARED_PATH . '/footer.php'); ?>
