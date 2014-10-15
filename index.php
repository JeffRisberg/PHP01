<html>
<body>

<h2>Welcome to Brandon's Pizza ZZA</h2>

Our pizza types are:
<ul>
    <?php

    $user = "developer";
    $password = "123456";
    $host = "localhost";
    $db_name = "php01";

    $db_connection = mysqli_connect($host, $user, $password, $db_name);
    $sql = <<<SQL
    SELECT *
    FROM pizza_types
SQL;

    if (!$result = mysqli_query($db_connection, $sql)) {
        die('There was an error running the query [' . mysqli_error($db_connection) . ']');
    }
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['name'];
    }?>
</ul>

<p><?php echo 'Total pizza types: ' . $result->num_rows; ?></p>

<h3>Current Orders:</h3>

<table>
    <tr><td>Buyer</td><td>Pizza Type</td><td>How Spicy?</td><td></td></tr>
<?php
$sql = <<<SQL
    SELECT *
FROM orders
SQL;

if (!$result = mysqli_query($db_connection, $sql)) {
die('There was an error running the query [' . mysqli_error($db_connection) . ']');
}
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['buyer_name'] . "</td>";
            echo "<td>" . $row['type_name'] . "</td>";
            echo "<td>" . $row['spicyness'] . "</td>";
            echo "<td><a href=\"order_edit.php?order_id=" . $row['order_id'] . "\">Edit</a></td>";
            echo "</tr>";
        }
        ?>
</table>

<h3>What tastes good to you?</h3>
<?php $result->free(); ?>
<form action="order_create.php">
    <table>
        <tr>
            <td>My name:</td>
            <td><input type="text" name="buyer_name"></td>
        </tr>
        <tr>
            <td>My type:</td>
            <td><input type="text" name="type_name"></td>
        </tr>
        <tr>
            <td>How Spicy?:</td>
            <td><input type="text" name="spicyness"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Place Order"></td>
        </tr>
    </table>
</form>
</body>
</html>