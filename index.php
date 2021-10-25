<?php
error_reporting(-1);
session_start();
require_once "includes/header.php";
?>

<div id="home">

<?php 
require_once "includes/navigation.php";
//inloggad? nah
if (!isset($_SESSION["isLoggedIn"])){
    echo "<div id='index'>
            <div id='parchmentFold'>
                <div class='text'>
                    <p> Welcome to <a href='/index.php'>IDDb</a>!</p>
                    <h6 class='choices'>
                    <span>You can sign in</span>
                    <a href='/sign-in.php'> here.</a>
                    <span>Or</span>
                    <span> Look at the signs </span> 
                    <span>
                    to navigate!
                    </span></h6>
                </div>
            </div>
        </div>";
} else { //inloggad? aye
    echo "<div id='index'>
            <div id='parchmentFold'>
                <div class='text'>
                    <p> Welcome to <a href='/index.php'>IDDb</a>, </p>
                    <p> {$_SESSION['user']}!</p>
                    <h6 class='choices'>
                        <span> Look at the signs </span> 
                        <span>
                        to navigate!
                        </span></h6>
                        </span></h6>
                    </div>
                </div>
            </div>";
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