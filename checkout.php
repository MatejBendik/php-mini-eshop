<?php

// zaciatok session pre sledovanie obsahu kosika na kazdej stranke
session_start();

// zahrnutie pripojenie k db a taktiez suboru z funkciou 
require "inc/conn.php";
require "inc/functions.php";

$totalLength = 0;
// podmienka ktora je true, ked je stlacene tlacidlo checkout
if (isset($_POST['submit'])) {
    // dalsia podmienka, ktora je true ked su vyplnene vsetky polia spravne vo formulare
    if (
        isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['country'], $_POST['postal_code'], $_POST['address'])
        && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['country'] && !empty($_POST['postal_code'] && !empty($_POST['address'])))
    ) {
        // podmienka, ktora osetri email ci je v spravnom tvare, ak nie je tak do premennej $errorMsg[] priradi chybove hlasenie
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
            $errorMsg[] = 'Please enter a valid email address';
        } else {
            // druha vetva podmienky, kde kontrolujeme a zaroven definujeme od riadku 24 - 34 premenne ktore beru data o uzivatelovi z formularu 

            $firstName = checkInput($_POST['first_name']);
            $lastName = checkInput($_POST['last_name']);
            $email = checkInput($_POST['email']);
            $country = checkInput($_POST['country']);
            $postalCode = checkInput($_POST['postal_code']);
            $address = checkInput($_POST['address']);
            $paymentMethod = $_POST['payment_method'];
            $orderTotal = $_POST['total_price'];
            $totalLength = $_POST['total_length'];
            $orderStatus = 'confirmed';
            $createdAt = date('Y-m-d H:i:s');

            // premenna $slq ktora nesie sql kod, na vlozenie dat o uzivatelovi do tabulky orders
            $sql = "INSERT INTO orders (first_name, last_name, email, country, postal_code, address, payment_method, total_price, total_length, order_status, created_at)
            VALUES ('$firstName', '$lastName', '$email', '$country', '$postalCode', '$address', '$paymentMethod', '$orderTotal', '$totalLength', '$orderStatus', '$createdAt')";

            // ak dopyt prebehne spravne, tak ma podmienka hodnotu true
            if (mysqli_query($conn, $sql)) {
                // podmienka ktora ma hodnotu true, ak je nieco v kosiku 
                if (isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])) {
                    // po vstupe do podmienky sa vsetky kurzy z kosika odstrania / zrusi sa session shopping_cart
                    unset($_SESSION['shopping_cart']);
                    // pomocou built-in header funkcie sa presmerujeme na stranku thank_you.php
                    header('location:thank_you.php');
                    exit();
                }
            } else {
                // v druhej vetve podmienky / opacnom pripade sa do premennej s chybovymi hlaseniami vypise nove hlasenie a ukonci sa spojenie s db
                $errorMsg[] = "Unable to save your order. Please try again. " . mysqli_error($conn);
                mysqli_close($conn);
            }
        }
    } else {
        // v tejto vetve podmienky sa do arrayu $errorMsg[] zadavaju chybove hlasenia v pripade zleho vyplnenia formularu
        // ak je formularove pole vyplnene spravne, tak sa zapise do novej premennej $...Value 
        $errorMsg = [];

        if (!isset($_POST['first_name']) || empty($_POST['first_name'])) {
            $errorMsg[] = 'First name is required.';
        } else {
            $firstNameValue = $_POST['first_name'];
        }

        if (!isset($_POST['last_name']) || empty($_POST['last_name'])) {
            $errorMsg[] = 'Last name is required.';
        } else {
            $lastNameValue = $_POST['last_name'];
        }

        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $errorMsg[] = 'Email is required.';
        } else {
            $emailValue = $_POST['email'];
        }

        if (!isset($_POST['country']) || empty($_POST['country'])) {
            $errorMsg[] = 'Country is required.';
        } else {
            $countryValue = $_POST['country'];
        }

        if (!isset($_POST['postal_code']) || empty($_POST['postal_code'])) {
            $errorMsg[] = 'Postal code is required.';
        } else {
            $postalCodeValue = $_POST['postal_code'];
        }

        if (!isset($_POST['address']) || empty($_POST['address'])) {
            $errorMsg[] = 'Address is required.';
        } else {
            $addressValue = $_POST['address'];
        }

        if (!isset($_POST['payment_method']) || !empty($_POST['payment_method'])) {
            $errorMsg[] = 'Payment method is required.';
        } else {
            $paymentMethodValue = $_POST['payment_method'];
        }
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
    <link rel="stylesheet" type="text/css" href="css/checkout.css?v=<?php echo time(); ?>">
    <title>BeDEV | Checkout </title>
</head>

<?php

// zahrnutie navigacie na stranku

include "utils/navigation.php";

?>

<!-- Checkout formular -->

<div class="container">
    <div class="row gx-5">
        <h2 class="text-center" id="shop_heading">Checkout</h2>
        <div class=" col-lg-8">
            <h3>1. personal informations</h3>
            <?php
            // podmienka ktora je true ak je nieco v arrayi $errorMsg
            if (isset($errorMsg) && count($errorMsg) > 0) {
                // pomocou cyklu foreach sa vypisuju chybove hlasenia z arrayu $errorMsg
                foreach ($errorMsg as $error) {
                    echo "<div class='alert alert-danger'>" . $error . "</div>";
                }
            }
            ?>

            <!-- Konkretny checkout formular, v input tagoch v hodnotach value su data od uzivatela -->
            <form class="row g-3" id="checkout" method="POST">
                <div class="col-lg-5">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Elon" value="<?php echo (isset($firstNameValue) && !empty($firstNameValue)) ? $firstNameValue : '' ?>">
                </div>
                <div class="col-lg-5">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Musk" value="<?php echo (isset($lastNameValue) && !empty($lastNameValue)) ? $lastNameValue : '' ?>">
                </div>
                <div class="col-lg-10">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="elonmusk@tesla.com" value="<?php echo (isset($emailValue) && !empty($emailValue)) ? $emailValue : '' ?>">
                </div>
                <div class="col-lg-5">
                    <label class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Slovakia" value="<?php echo (isset($countryValue) && !empty($countryValue)) ? $countryValue : '' ?>">
                </div>
                <div class="col-lg-5">
                    <label class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="05262" value="<?php echo (isset($postalCodeValue) && !empty($postalCodeValue)) ? $postalCodeValue : '' ?>">
                </div>
                <div class="col-lg-10">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Hviezdoslavova 6" value="<?php echo (isset($addresssValue) && !empty($addressValue)) ? $addressValue : '' ?>">
                </div>
                <h3 id="payment_method_heading">2. payment method</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" value="Bank transfer" id="bank_transfer">
                    <label class="form-check-label">
                        Bank transfer
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" value="Card payment" id="card_payment">
                    <label class="form-check-label">
                        Card payment
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" value="Paypal" id="paypal">
                    <label class="form-check-label">
                        Paypal
                    </label>
                </div>
                <div class="bottom_separator"></div>
        </div>
        <div class="col-lg-3">
            <?php
            $totalPrice = 0;

            // podmienka, ktora nadobudne hodnotu true, ak je nieco v kosiku 
            if (!empty($_SESSION['shopping_cart'])) {
                // podmienka je true ak je obsah v kosiku > ako 0 
                if (count($_SESSION['shopping_cart']) > 0) {
                    // cyklus foreach ktory prechadza data v kosiku a sluzi len na vypocet celkovej ceny a celkoveho casu vsetkych kurzov v kosiku
                    foreach ($_SESSION['shopping_cart'] as $key => $course) {
                        $totalPrice = $totalPrice + $course['quantity'] * $course['price'];
                        $totalLength = $totalLength + $course['quantity'] * $course['length_hours'];
                    }
            ?>
                    <!-- Vysledne statistiky ohladom objednavky: cena, dan, celkova cena + skryte formularove polia, ktore sluzia iba na branie celkovej ceny a celkovej dlzky - pre zapisovanie do tabulky -->
                    <h2><strong>Summary:</strong></h2>
                    <h5><strong>Subtotal:</strong> <?php echo $totalPrice ?> €</h5>
                    <h5><strong>TAX (20%):</strong> <?php echo round(0.2 * $totalPrice, 2) ?> €</h5>
                    <input type="hidden" class="form-control" name="total_price" value="<?php echo $totalPrice + round(0.2 * $totalPrice, 2) ?>">
                    <input type="hidden" class="form-control" name="total_length" value="<?php echo $totalLength ?>">
                    <hr width="175px">
                    <h5><strong>Order total:</strong> <?php echo $totalPrice + round(0.2 * $totalPrice, 2) ?> €</h5>
                    <a style="text-decoration: none;" href="thank_you.php"><button type="submit" name="submit" class="btn btn-grad" id="complete">Complete payment</button></a>
            <?php
                }
            }
            ?>
        </div>
    </div>
    </form>
</div>
</div>
</div>

<?php

// zahrunite paty dole na stranku

include "utils/footer.php";

?>