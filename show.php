<?php
error_reporting(-1);

require_once "includes/functions.php";
require_once "includes/header.php";
$allDogs = getAllDogsDB();
?>

<div id="show">
<h3><a href="list.php">Go back to all the dogs</a></h3>


<?php 
//kollar om ID i $_GET finns.
if (isset($_GET["id"])){
    $dogID = $_GET["id"];
    $oneDog = [];
    //om ID stämmer överens med ID med hund - läggs den till i en array.
    foreach($allDogs as $dog){
        if ($dogID == $dog["id"]){
            array_push($oneDog, $dog);
        }
    }//om den INTE finns - alltså inget har lagts till i arrayen
    //skrivs det ut ett felmeddelande.
    if (count($oneDog) == 0){
        echo "<p class='error'>This dog does not exist.</p>";
    } else {
        //den första indexen av arrayen körs. det kan bara finnas 1 hund i arrayen.
        echo showOneDog($oneDog[0]);
    }
}

?>

</div>

<?php require_once "includes/footer.php"; ?>