<?php

// funkcia, ktora skuma ci data ktore zadal uzivatel na inpute su v spravnom tvare

function checkInput($input)
{
    $input = stripslashes(trim($input));
    $input = htmlentities($input, ENT_QUOTES);
    return $input;
}
