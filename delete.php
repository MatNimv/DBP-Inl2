<?php
error_reporting(-1);
// Hanterar radering av en hund (obs. måste vara inloggad) och slussar sedan
// vidare användaren till profilsidan.

//Detta ska inte vara en sida. Ni ska genom denna fil radera en hund (detta 
//ska styras genom GET-parametern "id") och sedan skicka tillbaka användaren till sidan 
//"Profile".

require_once "includes/functions.php";
?>

<?php
//kollar först om $_GET har id.
if (isset($_GET["id"])){
    $dogDeleteID = $_GET["id"];

    deleteDog($dogDeleteID);
}

if (!isset($_SESSION["isLoggedIn"])){
    header("Location: /sign-in.php");
    exit();
}
?>

