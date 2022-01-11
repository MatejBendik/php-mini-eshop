<?php

// zaciatok session pre sledovanie obsahu kosika na kazdej stranke
session_start();

// podmienka nadobuda hodnotu true, ak je stlacene jedno z tlacidiel bud na vymazanie produktu alebo, clear all  
if (isset($_GET['action'])) {
    // podmienka ktora je true ked je stlacene tlacidlo delete - pomocou metody GET berie info z url 
    if ($_GET['action'] == 'delete') {
        // foreach ktory vyprazdnuje hodnoty z kosika po kazdom kliknuti
        foreach ($_SESSION['shopping_cart'] as $key => $course) {
            if ($course['id'] == $_GET['id']) {
                unset($_SESSION['shopping_cart'][$key]);
            }
        }
        // podmienka ktora je true ked je stlacene tlacidlo clear all - pomocou metody GET berie info z url, a po stlaceni vyprazdnuje cely shopping cart session 
    } else if ($_GET['action'] == 'clear') {
        unset($_SESSION['shopping_cart']);
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/navigation.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/responsive.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/cart.css?v=<?php echo time(); ?>">
    <title>BeDEV | Cart </title>
</head>

<?php

// zahrnutie navigacie na stranku

include "utils/navigation.php";

?>

<!-- Header/hlavna sekcia v uvode nadpis Kosika -->

<div class="container">
    <div class="row gx-5">
        <h2 class="text-center" id="shop_heading">Shopping Cart</h2>
        <div class="col-lg-9">
            <?php
            // podmienka ktora je true, ak je kosik prazdny a zobrazuje dany obsah = Your cart is empty
            if (empty($_SESSION['shopping_cart'])) {
            ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <p>Your cart is empty.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php
            }
            // podmienka, ktore je true ak sa v kosiku nieco nachadza 
            if (!empty($_SESSION['shopping_cart'])) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Course</th>
                            <th scope="col" width="420px">Title</th>
                            <th scope="col" width="100px">Length</th>
                            <th scope="col" width="100px">Price</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        // premenne definujuce celkovu sumu kosika a celkovu dlzku v hodinach
                        $totalPrice = 0;
                        $totalLength = 0;

                        // cyklus ktory prechadza kosik a vypisuje z neho data do tabulky (kosiku) 
                        foreach ($_SESSION['shopping_cart'] as $key => $course) {
                        ?>
                            <tr>
                                <td><img src="img/courses/<?php echo $course['image'] ?>" alt="" width="60%" height="60%"> </td>
                                <td>
                                    <h5><?php echo $course['title'] ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $course['length_hours'] . " h" ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $course['price'] . " €" ?></h5>
                                </td>
                                <td class="text-center">
                                    <a style="text-decoration:none;" href="cart.php?action=delete&id=<?php echo $course['id'] ?>">&#10060;</a>
                                </td>
                            </tr>
                        <?php
                            // vypocet celkovej cely a celkoveho casu vsetkych kurzov v kosiku 

                            $totalPrice = $totalPrice + $course['quantity'] * $course['price'];
                            $totalLength = $totalLength + $course['quantity'] * $course['length_hours'];
                        }
                        ?>
                    </tbody>
                </table>
                <div class="d-grid justify-content-md-end">
                    <a style="text-decoration:none;" href="cart.php?action=clear"><button type="button" class="btn btn-danger" name="clear">Clear all</button></a>
                </div>
            <?php } ?>
        </div>
        <div class="col-lg-3">
            <?php
            // podmienka ktora je true, ak je nieco v kosiku 

            if (!empty($_SESSION['shopping_cart'])) {
                // dalsia podmienka ktora pocita obsah kosiku a je true, ak je vacsi ako 0 
                if (count($_SESSION['shopping_cart']) > 0) {
            ?>
                    <h2><strong>Total:</strong></h2>
                    <h5><strong>Total price:</strong> <?php echo $totalPrice ?> €</h5>
                    <h5><strong>Total length:</strong> <?php echo $totalLength ?> hours</h5>

                    <a style="text-decoration: none;" href="checkout.php"><button type="submit" class="btn btn-grad">Checkout</button></a>
        </div>
    </div>
<?php
                }
            }
?>
</div>
</div>
</div>

<?php

// zahrnutie paty dole na stranku

include "utils/footer.php";

?>