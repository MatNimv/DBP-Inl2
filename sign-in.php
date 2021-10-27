<?php
// Inloggningssidan. Tänk på att formuläret kan skicka uppgifterna till denna
// filen också. Det gäller då att du t.ex. kontrollerar om $_POST innehåller
// något. Om inloggningen lyckas slussar du vidare dom till listningssidan.

//Innehåller ett formulär för att logga in med email och lösenord 
//(formuläret kan antingen skicka sin data till en separat fil eller till sig själv). Skickar användaren 
//till "Dogs" vid inloggning, annars ska ett relevant felmeddelande visas. När en användare har 
//loggat in ska ni spara dennes "id" i er session (så ni har det tillgodo)

error_reporting(-1);
session_start();
require_once "includes/functions.php";
require_once "includes/header.php";
?>

<div id="zoomHome">

<!-- hantering av $_POST. -->
<?php

//få ut alla användare från JSON.
$users = getAllUsersDB();

if (isset($_POST["email"], $_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    foreach($users as $user){
        if ($email == $user["email"] && $password == $user["password"]){
            //skapar användaren för sessionen.
            $_SESSION["isLoggedIn"] = true;
            //användarnamn.
            $_SESSION["user"] = $user["username"];
            //id.
            $_SESSION["id"] = $user["id"];

            //när det är sparat i sessionen, skickas
            //användaren till list.php. (listan med hundar)
            header("Location: /list.php");
            exit();
        }
    }
    //om fälten är tomma blir det ett error.
    if ($email == "" || $password == ""){
        header("Location: /sign-in.php?error=1");
        exit();
        //email stämmer men inte password.
    } elseif($email == $user["email"] && $password !== $user["password"]){
        header("Location: /sign-in.php?error=2");
        exit();
        //password stämmer men inte email.
    } elseif($email !== $user["email"] && $password == $user["password"]){
        header("Location: /sign-in.php?error=3");
        exit();
    } else {//allt annat fel. Användarnamn / Lösen stämmer inte
        header("Location: /sign-in.php?error=4");
        exit();
    }
}

//kikar efter errors i $_GET.
if (isset($_GET["error"])){
    $error = $_GET["error"];

    if ($error == 1){//error 1 : fälten är tomma.
        echo '<p class="error">Please leave no empty fields.</p>';
    } elseif ($error == 2){ //fel password
        echo '<p class="error">Incorrect password.</p>';
    } elseif ($error == 3){ //fel email
        echo '<p class="error">The email does not exist.</p>';
    } elseif ($error == 4){ //fel kombination av user/pass - existerar inte alls
        echo '<p class="error">Incorrect username or password.</p>';
    }
}
?>


<?php require_once "includes/navigation.php"; ?>
<!-- Formulär -->
    <div id="sign-in">
        <div id="parchmentFold">
            <div class="text">
            <h2>Unlock the door</h2>
                <form method="POST" action="/sign-in.php">
                    <input type="text" name="email" placeholder="Your Email">
                    <input type="password" name="password" placeholder="Your Password">
                    <button>Sign In</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "includes/footer.php"; ?>