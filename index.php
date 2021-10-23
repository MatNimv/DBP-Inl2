<?php
error_reporting(-1);
session_start();
require_once "includes/header.php";
?>

<?php 
//inloggad? nah
if (!isset($_SESSION["isLoggedIn"])){
    echo "<div id='index'>
        <h2 class='title'>Welcome to IDDb!</h2>
        <h3>You can <a href='/sign-in.php'>sign in</a> or <a href='/list.php'>see the list of dogs.</a></h3>
    </div>";
} else { //inloggad? aye
    echo "<div id='index'>
    <h2 class='title'>Welcome to IDDb, {$_SESSION['user']}!</h2>
    <h3>You can <a href='/sign-out.php'>sign out</a> or <a href='/list.php'>see the list of dogs.</a></h3>
</div>";
}
?>

<?php
require_once "includes/footer.php";
?>