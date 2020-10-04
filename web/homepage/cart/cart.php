<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>


    <?php
    session_start();

    $items = array(
        'A123' => array(
            'name' => 'Shirt',
            'desc' => 'Cool shirt',
            'price' => 15
        ),
        'B456' => array(
            'name' => 'Camera',
            'desc' => 'Canon',
            'price' => 2500
        ),
        'Z999' => array(
            'name' => 'MacBook',
            'desc' => 'Apple Laptop',
            'price' => 9999
        )
    );


    // Add
    if (isset($_POST["buy"])) {
        // Check the item is not already in the cart
        if (!in_array($_POST["buy"], $_SESSION['cart'])) {
            // Add new item to cart
            $_SESSION['cart'][] = $_POST["buy"];
        }
    }

    // Delete Item
    else if (isset($_POST['delete'])) { // a remove button has been clicked
        // Remove the item from the cart
        if (false !== $key = array_search($_POST['delete'], $_SESSION['cart'])) {
            unset($_SESSION['cart'][$key]);
        }
    }

    // Empty Cart
    else if (isset($_POST["delete"])) { // remove item from cart
        unset($_SESSION['cart']);
    }

    if (isset($_SESSION["cart"])) {
    ?>

        <form action='cart.php' method='post'>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php
                // Set a default total
                $total = 0;
                foreach ($_SESSION['cart'] as $ino) {
                ?>
                    <tr>
                        <td>
                            Name: <?php echo $items[$ino]['name']; ?>
                        </td>
                        <td>
                            Price: <?php echo $items[$ino]["price"]; ?>
                        </td>
                        <td>
                            <button type='submit' name='delete' value='<?php echo $ino ?>'>Remove</button>
                        </td>
                    </tr>
                <?php
                    $total += $items[$ino]['price'];
                } // end foreach
                ?>

                Total: $<?php echo $total; ?>
                </table>
        </form>
        <a href="index.php"><button>Browse</button></a>
        <a href="checkout.php"><button>Chekout</button></a>
    <?php  } ?>
</body>

</html>