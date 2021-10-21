<?php
// Utloggning. Töm sessionen på data innan du slussar vidare dom till start-
// eller inloggningssidan.

//Detta behöver inte vara en sida, det går bra att direkt skicka 
//användarna vidare till t.ex. "Sign in" eller "Home".
error_reporting(-1);
session_start();

//raderar alla $_SESSION nycklar samt sessionen
unset($_SESSION["isLoggedIn"]);
unset($_SESSION["user"]);
unset($_SESSION["email"]);
unset($_SESSION["username"]);
unset($_SESSION["id"]);

session_destroy();

header("Location: /index.php");
exit();
?>