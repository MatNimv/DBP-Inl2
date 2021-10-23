<?php

// Sidan för att lägga till en ny hund, tänk på att man måste vara inloggad för
// att se och kunna besöka denna.

//Innehåller ett formulär för att lägga till en ny hund (formuläret kan antingen 
//skicka sin data till en separat fil eller till sig själv). När hunden är tillagd ska ett relevant 
//meddelande visas, annars ska ett relevant felmeddelande visas. Nyttja användarens "id" som ni 
//sparat i er session för att ange vem hundens "owner" är.
error_reporting(-1);
session_start();
if (!isset($_SESSION["isLoggedIn"])){
    header("Location: /sign-in.php");
    exit();
}
require_once "includes/functions.php";
require_once "includes/header.php";

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
<div id="add">
    <h2 class="title">Add another dog to your database</h2>
    <form action="/add.php" method="POST">
        <input type="text" name="dogName" placeholder="Name">
        <input type="text" name="breed" placeholder="Breed">
        <input type="number" min="0" name="age" placeholder="Age">
        <input type="text" name="notes" placeholder="Notes">
        <button>Add</button>
    </form>
    <?php
    if(isset($_POST["dogName"], $_POST["breed"], $_POST["age"], $_POST["notes"])){
        echo "<p>You added <span class='fett'>{$_POST['dogName']}</span>, who is a <span class='fett'>{$_POST['age']}</span>-year old <span class='fett'>{$_POST['breed']}</span>!</p>";
    }

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
<?php require_once "includes/footer.php"; ?>
