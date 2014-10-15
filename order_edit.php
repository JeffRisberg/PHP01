<!--/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 10/14/2014
 * Time: 3:40 PM
 */-->

<html>
<body>

<h2>Please Modify your Order:</h2>

<?php
$user = "developer";
$password = "123456";
$host = "localhost";
$db_name = "php01";

$db_connection = mysqli_connect($host, $user, $password, $db_name);
$order_id = $_REQUEST['order_id'];

$sql = <<<SQL
Select *
From orders
Where order_id = $order_id
SQL;

if (!$results = mysqli_query($db_connection, $sql)) {
    die ('There was an error running the query [' . mysqli_error($db_connection) . "]");
}

echo "Number of rows returned: " . mysqli_num_rows($results) . "<br>";
echo "Order_id=" . $order_id . "<br>";

$row = $results->fetch_row();
//var_dump($row);
?>

<form action="order_update.php">
    <input type="hidden" name="order_id" value="<?php echo $order_id;?>"/>
    <table>
        <tr>
            <td>My name:</td>
            <td><input type="text" name="buyer_name" value="<?php echo $row[1];?>"></td>
        </tr>
        <tr>
            <td>My type:</td>
            <td><input type="text" name="type_name" value="<?php echo $row[2];?>"></td>
        </tr>
        <tr>
            <td>How Spicy?:</td>
            <td><input type="text" name="spicyness" value="<?php echo $row[3];?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="operation" value="Update" default></td>
            <td><input type="submit" name="operation" value="Delete"></td>
        </tr>
    </table>
</form>
</body>
</html>