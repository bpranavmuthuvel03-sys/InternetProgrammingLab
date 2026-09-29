<?php

require_once "db_connect.php";

$query = "SELECT order_id, customer_name, product_name,
                 quantity, price, order_date
          FROM orders
          ORDER BY order_id DESC";

$data = $connection->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Order Records</title>

    <style>
        body {
            margin: 0;
            padding: 35px;
            font-family: Verdana, sans-serif;
            background: #e9eef5;
        }

        .wrapper {
            width: 95%;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #243447;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th {
            background: #243447;
            color: white;
            padding: 12px;
        }

        td {
            padding: 11px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background: #f4f6f8;
        }

        .empty {
            text-align: center;
            padding: 25px;
            color: #666;
        }

        .new-order {
            display: inline-block;
            margin-top: 22px;
            padding: 10px 18px;
            background: #243447;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>

</head>

<body>

<div class="wrapper">

    <h1>Order Records</h1>

    <table>

        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Date</th>
        </tr>

        <?php

        if ($data && $data->num_rows > 0) {

            while ($order = $data->fetch_assoc()) {

                echo "<tr>";

                echo "<td>" . $order["order_id"] . "</td>";

                echo "<td>" .
                     htmlspecialchars($order["customer_name"]) .
                     "</td>";

                echo "<td>" .
                     htmlspecialchars($order["product_name"]) .
                     "</td>";

                echo "<td>" . $order["quantity"] . "</td>";

                echo "<td>₹" .
                     number_format($order["price"], 2) .
                     "</td>";

                echo "<td>" . $order["order_date"] . "</td>";

                echo "</tr>";
            }

        } else {

            echo "<tr>";
            echo "<td colspan='6' class='empty'>";
            echo "No order records available.";
            echo "</td>";
            echo "</tr>";
        }

        ?>

    </table>

    <a class="new-order" href="index.html">
        Add New Order
    </a>

</div>

</body>

</html>

<?php

$connection->close();

?>
