<?php

// zaciatok session pre sledovanie obsahu kosika na kazdej stranke
session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/navigation.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/responsive.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/thank_you.css?v=<?php echo time(); ?>">
    <title>BeDEV | Thank You </title>
</head>

<?php

// zahrnutie navigacie na stranku

include "utils/navigation.php";

?>

<!-- Obsah stranky = podakovanie za objednavku -->

<div class="container">
    <div class="row gx-5 text-center">
        <div class="col-12 ">
            <h1 id="shop_heading">Thank You!</h1>
            <img src="img/thank_you_check.png" alt="Thank You" title="Thank You">
            <h3 id="thank_text">Your order was completed successfully. <br> Please check your email for more information.</h3>
            <a style="text-decoration:none;" href="index.php"><button type="button" class="btn btn-grad" id="back_to_home">Back to homepage</button></a>
        </div>
    </div>
</div>
</div>
</div>

<?php

// zahrunite paty dole na stranku

include "utils/footer.php";

?>