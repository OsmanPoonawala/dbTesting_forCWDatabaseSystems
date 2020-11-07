<?php require_once('../private/initialise.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php
    $rawCustomers = getCustomers();

    $deleteID = $_GET["delete"] ?? '';
    if (isset($_GET["delete"])) {
        deleteCustomer($deleteID);
        header('Location: customers.php');
    }
?>


<table>
    <tr>
        <th>Full Name</th>
        <th>Address</th>
        <th>Manage</th>
    </tr>

    <?php
        while ($customers = mysqli_fetch_assoc($rawCustomers)) {

            echo "<tr><td><a href=?delete=" . $customers["ID"] . " onclick=\"return confirm('Are you sure that you want to delete this user?');\">" . $customers["fullName"] . "</a></td>
            <td>" . $customers["address"] . "</td>
            <td><a href=orders.php?id=" . $customers["ID"] . ">Orders</a></td>
            <td><a href=deliveries.php?id=" . $customers["ID"] . ">Deliveries</a></td>
            </tr>";
        }
    ?>
</table>
<br />
<a href="<?php echo "addCustomer.php" ?>">Add Customer</a>


<?php include(SHARED_PATH . '/footer.php'); ?>
