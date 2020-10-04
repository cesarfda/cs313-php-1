<?php
session_start();
 $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_EMAIL);
 $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
 $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING);
 $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING);
 $state = filter_input(INPUT_POST, "state", FILTER_SANITIZE_STRING);
 $zip = filter_input(INPUT_POST, "zip", FILTER_SANITIZE_STRING);

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Name:<?=$firstname ?></p>
    <p>email:<?=$email ?></p>
    <p>address:<?=$address ?></p>
    <p>city:<?=$city ?></p>
    <p>state:<?=$state ?></p>
    <p>zip:<?=$zip ?></p>
    
    <?php
    if (isset($_SESSION["cart"])) {
    ?>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
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
                        
                    </tr>
                <?php
                    $total += $items[$ino]['price'];
                } // end foreach
                ?>

                Total: $<?php echo $total; ?>
            </table>
            <?php  } ?>
    </body>
</html>