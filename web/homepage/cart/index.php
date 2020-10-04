<?php
session_start ();

$items = array (
        'A123' => array (
                'name' => 'Shirt',
                'desc' => 'Cool shirt',
                'price' => 15 
        ),
        'B456' => array (
                'name' => 'Camera',
                'desc' => 'Canon',
                'price' => 2500 
        ),
        'Z999' => array (
                'name' => 'MacBook',
                'desc' => 'Apple Laptop',
                'price' => 9999 
        ) 
);

if (! isset ( $_SESSION ['cart'] )) {
    $_SESSION ['cart'] = array ();
}

// Add
if (isset ( $_POST ["buy"] )) {
    // Check the item is not already in the cart
    if (!in_array($_POST ["buy"], $_SESSION['cart'])) {
        // Add new item to cart
        $_SESSION ['cart'][] = $_POST["buy"];
    }
}

// Delete Item
else if (isset ( $_POST ['delete'] )) { // a remove button has been clicked
    // Remove the item from the cart
    if (false !== $key = array_search($_POST['delete'], $_SESSION['cart'])) {
        unset($_SESSION['cart'][$key]);
    }
}

// Empty Cart
else if (isset ( $_POST ["delete"] )) { // remove item from cart
    unset ( $_SESSION ['cart'] );
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Items</title>
</head>
<body>
<form action='index.php' method='post'>
    <?php
        foreach ( $items as $ino => $item ) {
            $title = $item ['name'];
            $desc = $item ['desc'];
            $price = $item ['price'];

            echo " <p>$title</p>";
            echo " <p>$desc</p>";
            echo "<p>\$$price</p>";

            if (in_array($ino, $_SESSION['cart'])) { // The $ino would be 'a123' for your first product
                echo "<p><button type='submit' name='delete' value='$ino'>Remove</button></p>";
            } else {
                echo "<button type='submit' name='buy' value='$ino'>Buy</button> ";
            }
        }
    ?>
</form>
<div><a href="cart.php"><button>check cart</button></a></div>

</body>
</html>
