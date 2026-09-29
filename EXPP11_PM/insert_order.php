<?php

require_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit();
}

$name = trim($_POST["customer_name"]);
$product = trim($_POST["product_name"]);
$qty = (int) $_POST["quantity"];
$price = (float) $_POST["price"];

$query = "INSERT INTO orders
          (customer_name, product_name, quantity, price)
          VALUES (?, ?, ?, ?)";

$statement = $connection->prepare($query);

if (!$statement) {
    die("Could not prepare the query.");
}

$statement->bind_param("ssid", $name, $product, $qty, $price);

if ($statement->execute()) {
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Saved</title>

    <style>
        body {
            margin: 0;
            background: #e9eef5;
            font-family: Verdana, sans-serif;
        }

        .message {
            width: 430px;
            margin: 100px auto;
            background: white;
            padding: 35px;
            text-align: center;
            border-radius: 8px;
        }

        h2 {
            color: #243447;
        }

        p {
            color: #555;
        }

        a {
            display: inline-block;
            margin: 8px;
            padding: 10px 15px;
            background: #243447;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>

<div class="message">

    <h2>Order Saved Successfully</h2>

    <p>The customer order has been added to the database.</p>

    <a href="index.html">New Order</a>
    <a href="view_orders.php">View Orders</a>

</div>

</body>
</html>

<?php

} else {

    echo "Unable to save order: " . $statement->error;

}

$statement->close();
$connection->close();

?>