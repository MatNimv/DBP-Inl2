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
$allDogs = getAllDogsDB();
?>

<!-- skapa element för varje hund -->
<?php 
//ändrar h2 beroende på om vi visar alla hundar
//eller endast en särskild ras
if (!isset($_GET["breed"])){
echo '<h2>All Dogs</h2>';
} else {
    echo "<h2>All {$_GET['breed']}s</h2>";
    echo "<h3><a href='list.php'>Go back to all the dogs</a></h3>";
}
?>
<div id="list">
<?php 

//har vi breed i $_GET?
if (isset($_GET["breed"])){
    $breed = $_GET["breed"];

    foreach($allDogs as $dog){
        if ($breed == $dog["breed"]){
            echo showOneDog($dog);
            break;
        }
    }
} else {//går genom och visar ALLA hundar.
    foreach($allDogs as $dog){
        echo showOneDog($dog);
    }
}


?>

</div>


<?php require_once "includes/footer.php";