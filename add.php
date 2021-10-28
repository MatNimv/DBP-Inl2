<?php
error_reporting(-1);
session_start();
if (!isset($_SESSION["isLoggedIn"])){
    header("Location: /sign-in.php");
    exit();
}
require_once "includes/functions.php";
require_once "includes/header.php";
$allDogs = getAllDogsDB();

//checkar $_POST värdena
if (isset($_POST["dogName"], $_POST["breed"], $_POST["age"], $_POST["notes"])){
    $name = $_POST["dogName"];
    $breed = $_POST["breed"];
    $age = $_POST["age"];
    $notes = $_POST["notes"];
    //om fälten är tomma blir det ett error.
    if ($name == "" || $breed == "" || $age == "" || $notes == ""){
        header("Location: /add.php?error=1");
        exit();
    } elseif ($age > 18 ) {//hunden är äldre än 18år
        header("Location: /add.php?error=2");
        exit();
    }
    addDog($_POST);
}
?>

<div id="inside">
<?php require_once "includes/navigation.php"; ?>
    <div id="add">
        <div id="parchmentFold">
            <div class="text">
                <h2>Adopt Dog</h2>
                <form action="/add.php" method="POST">
                    <input type="text" name="dogName" placeholder="Name">
                    <input type="text" name="breed" placeholder="Breed">
                    <input type="number" min="0" name="age" placeholder="Age">
                    <input type="text" name="notes" placeholder="Notes">
                    <button>Add</button>
                </form>
            </div>
        </div>
<?php
    //kikar efter errors i $_GET.
    if (isset($_GET["error"])){
        $error = $_GET["error"];
        if ($error == 1){//error 1 : fälten är tomma.
            echo '<p class="error">Please leave no empty fields.</p>';
        } elseif($error == 2){//error 2: du har en himla gammal hund alltså
            echo '<p class="error">Bro. Your dog is not that old.</p>';
        }
    }
?>
    </div>

<?php 
if(isset($_POST["dogName"], $_POST["breed"], $_POST["age"], $_POST["notes"])){
        $whichDogImage = ["1","2","3","4","5","6","7","8"];
        $randomDogImg = randPosition($whichDogImage);
        echo "<p class='signBorder'>You added <span class='fett'>{$_POST['dogName']}</span>, who is a <span class='fett'>{$_POST['age']}</span>-year old <span class='fett'>{$_POST['breed']}</span>!</p>";
        echo "<div class='newDog$randomDogImg'></div>";
    }
if(count($allDogs) >= 8){
    echo "<p class='errorTwo'>It's getting a bit crowded in the backyard!</p>";
}
?>

<?php 
if (isset($_SESSION["isLoggedIn"])){
echo '<div id="loggedContainer">
        <div id="loggedIn"><a href="sign-out.php">Sign out</a></div>
    </div>';
}
?>
</div>

<?php require_once "includes/footer.php"; ?>
