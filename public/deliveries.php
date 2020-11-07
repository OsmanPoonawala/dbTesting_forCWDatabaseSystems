<?php require_once('../private/initialise.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php
    $customerID = $_GET['id'];
    $rawDeliveries = getDeliveries($customerID);
?>




<?php
    while ($deliveries = mysqli_fetch_assoc($rawDeliveries)) {
        
        echo "<p>Delivery ID: ". $deliveries["ID"] ."</p>
        <p>Delivery Date: " . $deliveries["deliveryDate"] ."</p>";
        $rawDeliveryDetails = getDeliveryDetails($deliveries["ID"]);
        while ($deliveryDetails = mysqli_fetch_assoc($rawDeliveryDetails)) {
            echo "<table>
            <tr>
                <th>Item Number</th>
                <th>Quantity</th>
            </tr>
            <tr><td>" . $deliveryDetails["itemNumber"] . "</td>
            <td>" . $deliveryDetails["quantity"] . "</td></tr>";
        }
    }
?>
</table>
<br />
<?php include(SHARED_PATH . '/footer.php'); ?>
