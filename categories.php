<?php

// zaciatok session, sluzi na sledovanie obsahu kosika
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
    <link rel="stylesheet" type="text/css" href="css/categories.css?v=<?php echo time(); ?>">
    <title>BeDEV | Categories</title>
</head>

<?php

// zahrnutie navigacie

include "utils/navigation.php";

?>

<!-- Header/hlavna sekcia v uvode stranky -->

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h2 id="heading_text">Choose your Category</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto sequi labore at molestias, ipsam aspernatur, eius iste quam perspiciatis sint debitis nemo quasi minus.
                Animi consequatur quo distinctio doloribus? Adipisci.</p>
            <div class="row">
                <div class="col-lg-6">
                    <button type="button" class="btn btn-grad">Shop</button>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="img/categories_web_heading.png" class="img-fluid" alt="Choose your category" title="Choose your category" id="categories_header">
        </div>
    </div>
</div>

<!-- Zaciatok sekcie Categories - zacina vlnkou -->

<div class="categories_wave_start">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#12d8fa" fill-opacity="1" d="M0,64L60,69.3C120,75,240,85,360,101.3C480,117,600,139,720,170.7C840,203,960,245,1080,250.7C1200,256,1320,224,1380,208L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
</div>
<!-- Content sekcie Categories -->
<div class="categories_wave_content">
    <div class="container">
        <h1 class="text-center" id="heading_categories_wave">Categories</h1>
        <div class="row">
            <?php

            // zahrnutie pripojenia k databaze
            require "inc/conn.php";

            // definovanie premennej $query, ktora nesie sql kod / dopyt
            $query = "SELECT * FROM categories";
            // $result je premenna, ktora sluzi na vykonanie toho dopytu pomocou spojenia s databazou a danym sql kodom (nadobuda hodnotu true/false)
            $result = mysqli_query($conn, $query);

            // podmienka, kedy ak sa dopyt vykona spravne, tak ide do dalsej podmienky
            if ($result) {
                // dalsia podmienka, ktora nadobudne hodnotu true ak je pocet riadkov vykonaneho dopytu vacsi ako 0 
                if (mysqli_num_rows($result) > 0) {
                    // a pusti sa while cyklus ktory funguje na podobnej baze ako foreach cyklus ale do premennej $category berie data z tabulky z daneho riadku ktory sa ulozi ako array
                    while ($category = mysqli_fetch_assoc($result)) {

            ?>
                        <!-- vypis kategorii z tabulky do div elementov -->
                        <div class="col-lg-4 text-center">
                            <div class="category">
                                <img src="img/categories/<?php echo $category['category_image'] ?>" alt="<?php echo $category['category_title'] ?>" title="<?php echo $category['category_title'] ?>">
                                <h2 class="category_title"><?php echo $category['category_title'] ?></h2>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</div>

<!-- Koniec sekcie Categories - konci vlnkou -->

<div class="categories_wave_end">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#12d8fa" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,133.3C384,139,480,117,576,117.3C672,117,768,139,864,149.3C960,160,1056,160,1152,144C1248,128,1344,96,1392,80L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
</div>


<?php

// zahrnutie paty dole na stranku

include "utils/footer.php";

?>