<?php
error_reporting(-1);
session_start();
require_once "includes/functions.php";
// Lista alla hundar.

//Innehåller en lista över alla hundar i databasen. Det ska finnas möjlighet att 
//kunna (1) klicka på en hunds namn (då skickas dom till sidan "Show") samt (2) kunna klicka på 
//hundrasen för att filtrera alla hundar därefter (detta ska styras genom GET-parametern "breed", 
//t.ex. "list.php?breed=husky).

require_once "includes/header.php";
?>



<!-- skapa element för varje hund -->
<h2>All Dogs</h2>
<div id="list">
<?php 

$allDogs = getAllDogsDB();
//går genom och visar ALLA hundar.
foreach($allDogs as $dog){
    echo showOneDog($dog);
}
?>

</div>


<?php require_once "includes/footer.php";