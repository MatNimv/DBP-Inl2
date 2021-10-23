<?php
error_reporting(-1);
session_start();

//raderar alla $_SESSION nycklar samt sessionen

session_destroy();

header("Location: /index.php");
exit();
?>