<html>
<body>

<h2>Welcome to ZZA</h2>

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

<h3>What tastes good to you?</h3>
<?php $result->free(); ?>
<form action="order.php">
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
            <td><input type="submit"></td>
        </tr>
    </table>
</form>
</body>
</html>