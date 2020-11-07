<?php
    function getCustomers() {
        global $db;
        $sql = "SELECT * FROM Customers";
        $result = mysqli_query($db, $sql);
        return $result;
    }

    function addCustomer($fullName, $address) {
        global $db;
        $sql = "INSERT INTO Customers (`fullName`, `address`) ";
        $sql .= "VALUES (";
        $sql .= "'" . $fullName . "', ";
        $sql .= "'" . $address . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        return $result;
    }

    function deleteCustomer($ID) {
        global $db;
        $sql = "DELETE FROM Customers ";
        $sql .= "WHERE ID='" . db_escape($db, $ID) . "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($db, $sql);
        if ($result) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function getItems() {
        global $db;
        $sql = "SELECT * FROM Items";
        $result = mysqli_query($db, $sql);
        return $result;
    }

    function addItem($itemNumber, $description, $weight, $price) {
        global $db;
        $sql = "INSERT INTO Items (`itemNumber`, `description`, `weight`, `price`) ";
        $sql .= "VALUES (";
        $sql .= "'" . $itemNumber . "', ";
        $sql .= "'" . $description . "', ";
        $sql .= "'" . $weight . "', ";
        $sql .= "'" . $price . "'";
        $sql .= ")";        
        $result = mysqli_query($db, $sql);
        return $result;
    }

    function deleteItem($ID) {
        global $db;
        $sql = "DELETE FROM Items ";
        $sql .= "WHERE ID='" . db_escape($db, $ID) . "' ";
        $sql .= "LIMIT 1";
        $result = mysqli_query($db, $sql);
        if ($result) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function getOrders($customerID) {
        global $db;
        $sql = "SELECT * FROM StandingOrders WHERE `customerID`=$customerID";
        $result = mysqli_query($db, $sql);
        return $result;
    }

    function addOrder($itemNumber, $customerID, $quantity) {
        global $db;
        $sql = "INSERT INTO StandingOrders (`itemNumber`, `customerID`, `quantity`) ";
        $sql .= "VALUES (";
        $sql .= "'" . $itemNumber . "', ";
        $sql .= "'" . $customerID . "', ";
        $sql .= "'" . $quantity . "'";
        $sql .= ")";        
        $result = mysqli_query($db, $sql);
        return $result;
    }

    function deleteOrder($ID) {
        global $db;
        $sql1 = "SELECT customerID FROM StandingOrders WHERE ID=" . $ID;
        $result1 = mysqli_query($db, $sql1);
        $rawCustomerID = $result1;
        $CID = mysqli_fetch_assoc($rawCustomerID);
        $customerID = $CID['customerID'];
        $sql2 = "DELETE FROM StandingOrders ";
        $sql2 .= "WHERE ID='" . db_escape($db, $ID) . "' ";
        $sql2 .= "LIMIT 1";
        $result2 = mysqli_query($db, $sql2);
        if ($result1 and $result2) {
            return $customerID;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function addDelivery($customerID, $deliveryDate) {
        global $db;
        $sql = "INSERT INTO Deliveries (`customerID`, `deliveryDate`) VALUES ($customerID, '$deliveryDate')";
        $result = mysqli_query($db, $sql);
        return $result;
    }

    function addDeliveryDetails($deliveryID, $itemNumber, $quantity) {
        global $db;
        $sql = "INSERT INTO DeliveryDetails (`deliveryID`, `itemNumber`, `quantity`) ";
        $sql .= "VALUES (";
        $sql .= "'" . $deliveryID . "', ";
        $sql .= "'" . $itemNumber . "', ";
        $sql .= "'" . $quantity . "'";
        $sql .= ")";        
        $result = mysqli_query($db, $sql);
        return $result;
    }

    function getDeliveries($customerID) {
        global $db;
        $sql = "SELECT * FROM Deliveries WHERE `customerID`=$customerID";
        $result = mysqli_query($db, $sql);
        return $result;
    }

    function getDeliveryDetails($deliveryID) {
        global $db;
        $sql = "SELECT * FROM DeliveryDetails WHERE `deliveryID`=$deliveryID";
        $result = mysqli_query($db, $sql);
        return $result;
    }
?>