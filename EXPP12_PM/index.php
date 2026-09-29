<?php

$library = simplexml_load_file("collection.xml");

if ($library === false) {
    die("Could not open collection.xml");
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>My Book Shelf</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Georgia, serif;
            background: #eeeae4;
            color: #292929;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .side {
            width: 230px;
            background: #252525;
            color: white;
            padding: 35px 20px;
        }

        .side h1 {
            font-size: 26px;
            margin-bottom: 40px;
        }

        .side p {
            line-height: 1.7;
            color: #cccccc;
        }

        .content {
            flex: 1;
            padding: 35px;
        }

        .heading {
            border-bottom: 2px solid #b08968;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .heading h2 {
            margin: 0;
            font-size: 30px;
        }

        .book {
            display: flex;
            align-items: center;
            background: #ffffff;
            margin-bottom: 14px;
            padding: 18px;

            border-radius: 5px;
            box-shadow: 0 2px 6px #d0d0d0;
        }

        .number {
            width: 55px;
            font-size: 22px;
            font-weight: bold;
            color: #b08968;
        }

        .book-details {
            flex: 1;
        }

        .book-details h3 {
            margin: 0 0 7px 0;
            color: #3b2f2f;
        }

        .book-details p {
            margin: 4px 0;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .book-price {
            width: 100px;
            text-align: right;
            font-family: Arial, sans-serif;
            font-weight: bold;
            color: #8b5e34;
        }

        .code {
            color: #999;
            font-size: 12px;
        }

        .bottom {
            margin-top: 25px;
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #777;
        }

    </style>

</head>

<body>

<div class="layout">

    <aside class="side">

        <h1>📚 My Shelf</h1>

        <p>
            Welcome to my personal book
            collection.
        </p>

        <p>
            Browse the available books
            and their details.
        </p>

    </aside>


    <main class="content">

        <div class="heading">
            <h2>Book Collection</h2>
        </div>


        <?php

        $count = 1;

        foreach ($library->volume as $entry) {

        ?>

        <div class="book">

            <div class="number">
                <?php echo $count; ?>
            </div>

            <div class="book-details">

                <h3>
                    <?php echo $entry->bookname; ?>
                </h3>

                <p>
                    Author:
                    <b><?php echo $entry->writer; ?></b>
                </p>

                <p>
                    Published:
                    <?php echo $entry->published; ?>
                </p>

                <p>
                    Language:
                    <?php echo $entry->language; ?>
                </p>

                <span class="code">
                    Book ID: <?php echo $entry['id']; ?>
                </span>

            </div>

            <div class="book-price">

                ₹<?php echo $entry->cost; ?>

            </div>

        </div>

        <?php

            $count++;

        }

        ?>

        <div class="bottom">
            Total books displayed from XML:
            <?php echo $count - 1; ?>
        </div>

    </main>

</div>

</body>

</html>