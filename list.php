<?php
error_reporting(-1);
session_start();
require_once "includes/functions.php";
// Lista alla hundar.

require_once "includes/header.php";
$allDogs = getAllDogsDB();
?>


<div id="backyard">
<?php require_once "includes/navigation.php"; ?>

    <!-- skapa element för varje hund -->
    <?php 
    //ändrar h2 beroende på om vi visar alla hundar
    //eller endast en särskild ras
    if (!isset($_GET["breed"])){
    echo '<h2 class="title">All Dogs</h2>';
    } else {
        echo "<h2 class='title'>All {$_GET['breed']}s</h2>";
    }
    ?>
    <div id="list">
    <?php 

    //kollar om BREED i $_GET finns.
    if (isset($_GET["breed"])){
        $breed = $_GET["breed"];
        $dogBreeds = [];
        //om breed stämmer överens med breed med hund - läggs den till i en array.
        foreach($allDogs as $dog){
            if ($breed == $dog["breed"]){
                array_push($dogBreeds, $dog);
            }
        }//om breeden INTE finns - alltså inget har lagts till i arrayen
        //skrivs det ut ett felmeddelande. 
        if (count($dogBreeds) == 0){
            echo "<p class='error'>This breed does not exist.</p>";
        } else {//varje breed med samma $_GET visas
            foreach($dogBreeds as $dog){
                echo showOneDog($dog);
            }
        }
    } else {//går genom och visar ALLA hundar.
        foreach($allDogs as $dog){
            echo showOneDog($dog);
        }
    }
    //allt ovan kan jag ju ha i i en funktion i functions.php, och sedan kalla på den.  
    //Tycker själv det är tydligare att ha foreach på plats där det sker.
    ?>

</div>

<?php 
if (isset($_SESSION["isLoggedIn"])){
echo '<div id="loggedContainer">
        <div id="loggedIn"><a href="sign-out.php">Sign out</a></div>
    </div>';
}
?>
    </div>

<!--<img src="/assets/images/animals/dog_3.gif">-->

<?php require_once "includes/footer.php"; ?>