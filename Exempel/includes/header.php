<?php
// Start på er HTML (doctype, body, navigation)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <title>Min Sida</title>
</head>
<body>
    <main>
    <h1>The Internet Dog Database</h1>
    <div id="wrapper">
        <?php
        //är någon inloggad? no.
            if (!isset($_SESSION["isLoggedIn"])){
                echo "
                    <nav>
                        <h2><a href='/index.php'>Hem</a></h2>
                        <h2><a href='/list.php'>Hundar</a></h2>
                        <h2><a href='/sign-in.php'>Sign In</a></h2>
                    </nav>
                ";
            } else {
                //är någon inloggad? yes.
                echo "
                <nav>
                    <h2><a href='/index.php'>Hem</a></h2>
                    <h2><a href='/list.php'>Hundar</a></h2>
                    <h2><a href='/add.php'>Add</a></h2>
                    <h2><a href='/profile.php'>Profile</a></h2>
                    <h2><a href='/sign-out.php'>Logga Ut</a></h2>
                </nav>
            ";
            }
        ?>