<?php
error_reporting(-1);

require_once "includes/functions.php";
require_once "includes/header.php";
$allDogs = getAllDogsDB();
?>

<div id="zoomBackyard">
    <?php require_once "includes/navigation.php"; ?>

        <div id="show">
        <div id='signContainer'>
                <div id='backFromSpecific'>
                    <p>
                        <span><a href='list.php'>Go back</a></span>
                        <span><a href='list.php'>to all </a></span>
                        <span><a href='list.php'>the dogs</a></span>
                    </p>
                </div>
            </div>";


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
    <?php 
    if (isset($_SESSION["isLoggedIn"])){
    echo '<div id="loggedContainer">
            <div id="loggedIn"><a href="sign-out.php">Sign out</a></div>
        </div>';
    }
    ?>
    </div>
<?php require_once "includes/footer.php"; ?>