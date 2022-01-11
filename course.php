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
    <link rel="stylesheet" type="text/css" href="css/course.css?v=<?php echo time(); ?>">
    <title>BeDEV | Course </title>
</head>

<?php

// zahrnutie navigacie

include "utils/navigation.php";

?>


<?php

// zahrnutie suboru conn.php ktory sluzi na pripojenie k db

require "inc/conn.php";

// premenna $courseID ktora berie pomocou metody GET idcko daneho kurzu z url adresy 
$courseID = $_GET['id'];
// definovanie premennej $queryAll, ktora nesie sql kod / dopyt s dvoma joinami na 2 rozlicne tabulky, vypisanie potrebnych informacii o danom kurze
$queryAll = "SELECT * FROM courses INNER JOIN instructors ON courses.instructor_id = instructors.id INNER JOIN categories ON categories.id = courses.category_id WHERE courses.id = $courseID";
// $result je premenna, ktora sluzi na vykonanie toho dopytu pomocou spojenia s databazou a danym sql kodom (nadobuda hodnotu true/false)
$result = mysqli_query($conn, $queryAll);

// podmienka, kedy ak sa dopyt vykona spravne/true, tak ide do dalsej podmienky
if ($result) {
    // dalsia podmienka, ktora nadobudne hodnotu true ak je pocet riadkov vykonaneho dopytu vacsi ako 0 
    if (mysqli_num_rows($result) > 0) {
        // a pusti sa while cyklus ktory funguje na podobnej baze ako foreach cyklus ale do premennej $course berie data zo vsetkych tabulkiek z danych riadkov a ulozia sa ako array a potom 
        while ($course = mysqli_fetch_assoc($result)) {

?>
            <!-- vypis konkretnych dat z tabuliek na stranku pomocou premennej $course a v [] je nazov stlpcov -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-6" id="courseInfo1">
                        <h2><?php echo $course['title'] ?></h2>
                        <p><?php echo $course['description'] ?></p>
                        <p><strong>Technologies:</strong> <?php echo $course['technologies'] ?></p>
                        <h4><strong>Rating: </strong> <?php echo $course['rating'] ?> &#11088 </h4>
                        <h5><strong>Length: </strong> <?php echo $course['length_hours'] ?> hours</h5>
                        <br>
                        <h5><strong>Upload date: </strong> <?php echo date("j F Y", strtotime($course['upload_date'])) ?></h5>
                    </div>
                    <div class="col-lg-6">
                        <div class="courseInfo2">
                            <img src="img/courses/<?php echo $course['image'] ?>" alt="">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <h3><strong>Category: </strong> <?php echo $course['category_title'] ?></h3>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <h3><strong>Instructor:</strong></h3>
                        <h4><?php echo $course['first_name'] . " " . $course['last_name'] ?></h4>
                        <p><?php echo $course['about'] ?></p>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Total courses</h4>
                                <h4><?php echo $course['courses'] ?></h4>
                            </div>
                            <div class="col-lg-6">
                                <h4>Total students</h4>
                                <h4><?php echo number_format($course['students'], 0, '.', ' ') ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" id="courseInfo2">
                        <img class="profile_pic" src="img/instructors/<?php echo $course['profile_picture'] ?>" alt="">
                    </div>
                    <div class="separator"></div>
                </div>
            </div>

<?php }
    }
}

?>

<?php

// zahrnutie paty dole na stranku

include "utils/footer.php";

?>