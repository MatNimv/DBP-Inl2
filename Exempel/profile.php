<?php
error_reporting(-1);
session_start();
// Profilsidan (obs. måste vara inloggad), lista en användares alla hundar.

//Innehåller en lista över en användares alla hundar. Namn och hundras 
//behöver inte vara länkar i denna listan (som på sidan "Show"). Det ska däremot finnas en länk 
//för varje hund som gör att hunden raderas från listan (t.ex. genom en länk till "delete.php?
//id=3").

require_once "includes/header.php";
?>

<div id="profile">
    <h2>Your Dogs</h2>
    list of all MY dogs
</div>


<?php require_once "includes/footer.php"; ?>