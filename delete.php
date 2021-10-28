<?php
error_reporting(-1);
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

