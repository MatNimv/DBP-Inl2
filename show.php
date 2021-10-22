<?php
error_reporting(-1);
// Visar information om en hund baserat på ett "id".
//Innehåller information om en specifik hund. Detta ska styras genom GETparametern "id" (t.ex. "show.php?id=3"). Om hunden inte finns (dvs. "id" inte finns) så ska ett relevant felmeddelande visas

//allt på denna sidan kan endast ske om användaren är inloggad.
if (!isset($_SESSION["isLoggedIn"])){
require_once "includes/functions.php";
require_once "includes/header.php";
$allDogs = getAllDogsDB();
?>

<div id="show">
<h3><a href="list.php">Go back to all the dogs</a></h3>

<?php 
if (isset($_GET["id"])){
    $dogID = $_GET["id"];

    foreach($allDogs as $dog){
        if ($dogID == $dog["id"]){
            echo showOneDog($dog);
            break;
        }
    }
}

?>
</div>


<?php require_once "includes/footer.php"; ?>

<?php }else {
    echo '<h3>You should not be here.</h3>';
} ?>