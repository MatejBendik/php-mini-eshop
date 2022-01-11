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
    <link rel="stylesheet" type="text/css" href="css/courses.css?v=<?php echo time(); ?>">
    <title>BeDEV | Courses</title>
</head>

<?php

// zahrnutie navigacie

include "utils/navigation.php";

?>

<!-- Header/hlavna sekcia v uvode stranky -->

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h2 id="heading_text">Create your Own Future</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto sequi labore at molestias, ipsam aspernatur, eius iste quam perspiciatis sint debitis nemo quasi minus.
                Animi consequatur quo distinctio doloribus? Adipisci.</p>
        </div>
        <div class="col-lg-6">
            <img src="img/courses_web_heading.png" class="img-fluid" alt="Courses for best prices" title="Courses for best prices" id="courses_header">
        </div>
    </div>
</div>

<!-- Zaciatok sekcie Most popular courses - zacina vlnkou -->

<div class="courses_wave_start">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#12d8fa" fill-opacity="1" d="M0,64L48,85.3C96,107,192,149,288,170.7C384,192,480,192,576,202.7C672,213,768,235,864,240C960,245,1056,235,1152,202.7C1248,171,1344,117,1392,90.7L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
</div>
<!-- Zaciatok contentu Most popular courses -->
<div class="courses_wave_content">
    <div class="container">
        <h1 class="text-center" id="heading_courses_wave">Most popular courses</h1>
        <?php

        // zahrnutie pripojenia k databaze
        require "inc/conn.php";

        // definovanie premennej $queryTop, ktora nesie sql kod / dopyt konkretne na vypisanie prvych 4 kurzov z tabulky (na to sluzi LIMIT 4 v sql kode)
        $queryTop = "SELECT * FROM courses INNER JOIN instructors ON courses.instructor_id = instructors.id LIMIT 4";
        // $result je premenna, ktora sluzi na vykonanie toho dopytu pomocou spojenia s databazou a danym sql kodom (nadobuda hodnotu true/false)
        $result = mysqli_query($conn, $queryTop);

        // podmienka, kedy ak sa dopyt vykona spravne/true, tak ide do dalsej podmienky
        if ($result) {
            // dalsia podmienka, ktora nadobudne hodnotu true ak je pocet riadkov vykonaneho dopytu vacsi ako 0 
            if (mysqli_num_rows($result) > 0) {
                // a pusti sa while cyklus ktory funguje na podobnej baze ako foreach cyklus ale do premennej $category berie data z tabulky z daneho riadku ktory sa ulozi ako array
                while ($course = mysqli_fetch_assoc($result)) {

        ?>
                    <!-- vypis konkretnych dat z tabulky na stranku pomocou premennej $course a v [] je nazov stlpca -->
                    <div class="row" id="course">
                        <div class="col-lg-3 align-self-center text-center">
                            <a href="course.php?id=<?php echo $course['id'] ?>"><img src="img/courses/<?php echo $course['image'] ?>" alt=""></a>
                        </div>
                        <div class="col-lg-6">
                            <h2><?php echo $course['title'] ?></h2>
                            <p><?php echo $course['description'] ?></p>
                            <h4><strong>Instructor:</strong> <?php echo $course['first_name'] . " " . $course['last_name'] ?></h4>
                            <h5><strong>Rating:</strong> <?php echo $course['rating'] ?> &#11088 </h5>
                            <h5><strong>Length:</strong> <?php echo $course['length_hours'] . " hours" ?></h5>
                        </div>
                        <div class="col-lg-3 text-center">
                            <h3> <?php echo $course['price'] . " €" ?></h3>
                            <a style="text-decoration:none;" href="course.php?id=<?php echo $course['id'] ?>"><button type="button" class="btn btn-grad">Open course</button></a>
                        </div>
                    </div>

        <?php
                }
            }
        }
        ?>

        <!-- Tlacidlo na zobrazenie vsetkych kurzov -->

        <div class="row">
            <div class="col-lg-12 text-center">
                <button type="button" class="btn btn-custom" data-bs-toggle="collapse" data-bs-target="#showAll">Show All</button>
            </div>
        </div>

        <div class="collapse" id="showAll">
            <?php

            // definovanie premennej $queryAll, ktora nesie sql kod / dopyt konkretne na vypisanie vsetkych kurzov od id 4 
            $queryAll = "SELECT * FROM courses INNER JOIN instructors ON courses.instructor_id = instructors.id WHERE courses.id > 4";
            // $result je premenna, ktora sluzi na vykonanie toho dopytu pomocou spojenia s databazou a danym sql kodom (nadobuda hodnotu true/false)
            $result = mysqli_query($conn, $queryAll);

            // podmienka, kedy ak sa dopyt vykona spravne, tak ide do dalsej podmienky
            if ($result) {
                // dalsia podmienka, ktora nadobudne hodnotu true ak je pocet riadkov vykonaneho dopytu vacsi ako 0 
                if (mysqli_num_rows($result) > 0) {
                    // a pusti sa while cyklus ktory funguje na podobnej baze ako foreach cyklus ale do premennej $course berie data z tabulky z daneho riadku ktory sa ulozi ako array
                    while ($course = mysqli_fetch_assoc($result)) {

            ?>
                        <!-- vypis konkretnych dat z tabulky na stranku pomocou premennej $course a v [] je nazov stlpca -->
                        <div class="row" id="course">
                            <div class="col-lg-3 align-self-center text-center">
                                <a href="course.php?id=<?php echo $course['id'] ?>"><img src="img/courses/<?php echo $course['image'] ?>" alt=""></a>
                            </div>
                            <div class="col-lg-6">
                                <h2><?php echo $course['title'] ?></h2>
                                <p><?php echo $course['description'] ?></p>
                                <h4><strong>Instructor:</strong> <?php echo $course['first_name'] . " " . $course['last_name'] ?></h4>
                                <h5><strong>Rating:</strong> <?php echo $course['rating'] ?> &#11088 </h5>
                                <h5><strong>Length:</strong> <?php echo $course['length_hours'] . " hours" ?></h5>
                            </div>
                            <div class="col-lg-3 text-center">
                                <h3> <?php echo $course['price'] . " €" ?></h3>
                                <a style="text-decoration:none;" href="course.php?id=<?php echo $course['id'] ?>"><button type="button" class="btn btn-grad">Open course</button></a>
                            </div>
                        </div>

            <?php
                    }
                }
            } ?>
        </div>
    </div>
</div>

<!-- Koniec sekcie Courses - konci vlnkou -->

<div class="course_wave_end">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#12d8fa" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,138.7C384,149,480,139,576,128C672,117,768,107,864,122.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
</div>

<?php

// zahrnutie paty dole na stranku

include "utils/footer.php";

?>