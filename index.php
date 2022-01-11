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
    <link rel="stylesheet" type="text/css" href="css/home.css?v=<?php echo time(); ?>">
    <title>BeDEV | Home</title>
</head>

<?php

// zahrnutie navigacie na stranku 

include "utils/navigation.php";

?>

<!-- Header/hlavna sekcia v uvode stranky -->

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h2 id="heading_text">Level up <br> your dev skills</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto sequi labore at molestias, ipsam aspernatur, eius iste quam perspiciatis sint debitis nemo quasi minus.
                Animi consequatur quo distinctio doloribus? Adipisci.</p>
            <div class="row">
                <div class="col-lg-6">
                    <a style="text-decoration:none;" href="shop.php"><button type="button" class="btn btn-grad">Shop</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="img/home_web_v2.png" class="img-fluid" id="home_heading_img" alt="Home header img" title="Home header img" id="home_header">
        </div>
    </div>
</div>

<!-- Zaciatok sekcie About us - zacina vlnkou -->

<div class="home_wave_start">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="home_wave_start">
        <path fill="#12d8fa" fill-opacity="1" d="M0,64L48,85.3C96,107,192,149,288,170.7C384,192,480,192,576,186.7C672,181,768,171,864,144C960,117,1056,75,1152,58.7C1248,43,1344,53,1392,58.7L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
</div>
<!-- Content sekcie About us -->
<div class="home_wave_content">
    <div class="container">
        <h1 class="text-center" id="heading_home_wave">About us</h1>
        <div class="row">
            <div class="col-lg-6 text-center">
                <img src="img/home_web_pause.png" class="img-fluid" alt="Home web mobile">
            </div>
            <div class="col-lg-6 text-start p-5">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non ex, inventore doloremque nam quas fugit, minima quisquam pariatur veniam odio labore repellat neque? Nisi recusandae, voluptatibus similique officia repellat architecto.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non ex, inventore doloremque nam quas fugit, minima quisquam pariatur veniam odio labore repellat neque? Nisi recusandae, voluptatibus similique officia repellat architecto.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non ex, inventore doloremque nam quas fugit, minima quisquam pariatur veniam odio labore repellat neque? Nisi recusandae, voluptatibus similique officia repellat architecto.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 text-end p-5">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non ex, inventore doloremque nam quas fugit, minima quisquam pariatur veniam odio labore repellat neque? Nisi recusandae, voluptatibus similique officia repellat architecto.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non ex, inventore doloremque nam quas fugit, minima quisquam pariatur veniam odio labore repellat neque? Nisi recusandae, voluptatibus similique officia repellat architecto.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non ex, inventore doloremque nam quas fugit, minima quisquam pariatur veniam odio labore repellat neque? Nisi recusandae, voluptatibus similique officia repellat architecto.</p>
            </div>
            <div class="col-lg-6 text-center">
                <img src="img/home_web_certification.png" class="img-fluid" alt="Home web certification">
            </div>
        </div>
    </div>
</div>
<!-- Koniec sekcie About us - konci vlnkou -->
<div class="home_wave_end">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#12d8fa" fill-opacity="1" d="M0,128L48,112C96,96,192,64,288,42.7C384,21,480,11,576,21.3C672,32,768,64,864,90.7C960,117,1056,139,1152,133.3C1248,128,1344,96,1392,80L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
</div>

<!-- Zaciatok sekcie Features -->

<div class="home_features">
    <div class="container">
        <h1 class="text-center" id="heading_home_features">Features</h1>
        <div class="row">
            <div class="col-lg-3 text-center">
                <div class="d-grid gap-4">
                    <div class="p-5">
                        <h2>Subtitles</h2>
                    </div>
                    <div class="p-5">
                        <h2>Coding Exercises</h2>
                    </div>
                    <div class="p-5">
                        <h2>Notes</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="img/home_web_features.png" class="img-fluid" alt="Home web features">
            </div>
            <div class="col-lg-3 text-center">
                <div class="d-grid gap-4">
                    <div class="p-5">
                        <h2>Full-HD Videos</h2>
                    </div>
                    <div class="p-5">
                        <h2>Quizzes</h2>
                    </div>
                    <div class="p-5">
                        <h2>Real-world Examples</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Koniec sekcie Features -->

<?php

// zahrnutie paty na stranku

include "utils/footer.php";

?>