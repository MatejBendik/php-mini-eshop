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
    <link rel="stylesheet" type="text/css" href="css/instructors.css?v=<?php echo time(); ?>">
    <title>BeDEV | Instructors</title>
</head>

<?php

// zahrnutie navigacie na stranku

include "utils/navigation.php";

?>

<!-- Header/hlavna sekcia v uvode stranky -->

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h2 id="heading_text">These people Will be Teaching you</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto sequi labore at molestias, ipsam aspernatur, eius iste quam perspiciatis sint debitis nemo quasi minus.
                Animi consequatur quo distinctio doloribus? Adipisci.</p>
            <div class="row">
                <div class="col-lg-6">
                    <a style="text-decoration:none;" href="shop.php"><button type="button" class="btn btn-grad">Shop</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="img/instructors_web_heading.png" class="img-fluid" alt="Instructors" title="Instructors" id="instructors_header">
        </div>
    </div>
</div>

<!-- Zaciatok sekcie Instructors - zacina vlnkou -->

<div class="instructors_wave_start">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#12d8fa" fill-opacity="1" d="M0,32L48,53.3C96,75,192,117,288,112C384,107,480,53,576,64C672,75,768,149,864,170.7C960,192,1056,160,1152,144C1248,128,1344,128,1392,128L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
</div>
<!-- Zaciatok sekcie s tabulkou v ktorej su vypisany vsetky instruktory z databazy -->
<div class="instructors_wave_content">
    <div class="container">
        <h1 class="text-center" id="heading_instructors_wave">Instructors</h1>
        <div class="row">
            <div id="table" class="text-center">
                <!-- Zaciatok tabulky Instructors -->
                <table class="table">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Id</th>
                            <th scope="col">Profile picture</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">About</th>
                            <th scope="col">Number of courses</th>
                            <th scope="col">Number of students</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        require "inc/conn.php";
                        // premenna $queryInstructors, ktora nesie sql dopyt 
                        $queryInstructors = "SELECT * FROM instructors";
                        // $result je premenna, ktora sluzi na vykonanie toho dopytu pomocou spojenia s databazou a danym sql kodom (nadobuda hodnotu true/false)
                        $result = mysqli_query($conn, $queryInstructors);

                        // podmienka, kedy ak sa dopyt vykona spravne, tak ide do dalsej podmienky
                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                // dalsia podmienka, ktora nadobudne hodnotu true ak je pocet riadkov vykonaneho dopytu vacsi ako 0 
                                while ($instructor = mysqli_fetch_assoc($result)) {
                                    // a pusti sa while cyklus ktory funguje na podobnej baze ako foreach cyklus ale do premennej $category beru data z tabulky z daneho riadku ktory sa ulozi ako array

                        ?>
                                    <!-- Jeden riadok tabulky - ktoreho obsahom su data z tabulky, ktore nesie premenna $instructors a v [] je nazov stlpca -->
                                    <tr class="text-white">
                                        <th scope="row" class="align-middle"><?php echo $instructor['id'] ?></th>
                                        <td><img class="instructor_profile" src="img/instructors/<?php echo $instructor['profile_picture'] ?>" alt="<?php echo $instructor['first_name']  . " " .  $instructor['last_name'] ?>" title="<?php echo $instructor['first_name'] . " " . $instructor['last_name'] ?>"></td>
                                        <td class="align-middle">
                                            <h5><?php echo $instructor['first_name'] ?></h5>
                                        </td>
                                        <td class="align-middle">
                                            <h5><?php echo $instructor['last_name'] ?></h5>
                                        </td>
                                        <td class="align-middle">
                                            <?php echo $instructor['about'] ?>
                                        </td>
                                        <td class="align-middle">
                                            <h5><?php echo $instructor['courses'] ?></h5>
                                        </td>
                                        <td class="align-middle">
                                            <h5><?php echo number_format($instructor['students'], 0, '.', ' ') ?></h5>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- Koniec sekcie Instructors - konci vlnkou -->

<div class="instructors_wave_end">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#12d8fa" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,133.3C384,139,480,117,576,117.3C672,117,768,139,864,149.3C960,160,1056,160,1152,144C1248,128,1344,96,1392,80L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
</div>


<?php

// zahrnutie paty dole na stranke

include "utils/footer.php";

?>