<?php
error_reporting(-1);
// Samling av relevanta funktioner, t.ex.:
// - Hämta en användare från databasen

//Hämtar alla användare från DB
function getAllUsersDB(){
    $jsonUser = file_get_contents("db.json");
    $dataUser = json_decode($jsonUser, true);

    //ALLA användare tho.
    $allUsers = $dataUser["users"];
    return $allUsers;
}

// - Hämta alla hundar från databasen
function getAllDogsDB(){
    $jsonDogs = file_get_contents("db.json");
    $data = json_decode($jsonDogs, true);

    $allDogs = $data["dogs"];

    return $allDogs;
}


// - Hämta en hund från databasen från $_GET  
// med hjälp av ?breed= eller ?id=
//när det är id är location show.php.
//breed är location list.php. iomed att det kan vara flera på breed



// - Lägg till en ny hund i databasen
function addDog($postInfo){
    $newDog = [
        "name" => $postInfo["dogName"],
        "breed" => $postInfo["breed"],
        "age" => $postInfo["age"],
        "notes" => $postInfo["notes"]
    ];
    //denna foreachen räknar ut den nya 
    //hundens id utifrån vilka som finns
    $highestID = 0;

    $allDogs = getAllDogsDB();
    foreach($allDogs as $dog){
        if ($dog["id"] > $highestID){
            $highestID = $dog["id"];
        }
    }
    //owner till den nya hunden, vilket är den som är inloggad
    $newDog["owner"] = $_SESSION["id"];
    //ID:et av den nya hunden
    $newDog["id"] = $highestID + 1;
    //lägg till hund i db.json
    $data = json_decode(file_get_contents("db.json"), true);
    array_push($data["dogs"], $newDog);
    $json = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents("db.json", $json);
}

//ta bort en hund för databasen. Denna actionen finns endast i profile.

//DOM för en hund.
function showOneDog($dogInfo){
    //koppla ihop användaren till sin hund
    $allUsers = getAllUsersDB();
    foreach($allUsers as $user){
        if($user["id"] == $dogInfo["owner"]){
            $nameOfUser = $user['username'];
            break;
        } else {
            $nameOfUser = '<p>No owner.</p>';
        }
    }
    //om vi är inne på profile ska deleteknappen finnas
    if (checkIfURL("profile") == true){
        $dogDiv = "<div class='oneDog'>
        <p class='name'><a href='show.php?id={$dogInfo['id']}'>{$dogInfo['name']}</a></p>
        <p class='breed'><a href='list.php?breed={$dogInfo['breed']}'>{$dogInfo['breed']}</a></p>
        <p class='age'>{$dogInfo['age']}</p>
        <p class='notes'>{$dogInfo['notes']}</p>
        <p class='owner'>{$nameOfUser}</p>
        <p class='delete'><a href='{$dogInfo['id']}'>DELETE</a></p>
    </div>";
    } else { //om vi INTE är inne på profile. då ska vi inte kunna
        // se delete knappen.
        $dogDiv = "<div class='oneDog'>
        <p class='name'><a href='show.php?id={$dogInfo['id']}'>{$dogInfo['name']}</a></p>
        <p class='breed'><a href='list.php?breed={$dogInfo['breed']}'>{$dogInfo['breed']}</a></p>
        <p class='age'>{$dogInfo['age']}</p>
        <p class='notes'>{$dogInfo['notes']}</p>
        <p class='owner'>{$nameOfUser}</p>
    </div>";
    }


    return $dogDiv;
}

//kollar efter särskild URL.
function checkIfURL($wordInURL){
    $doesWordExist = true;
    if (strpos($_SERVER['REQUEST_URI'], "$wordInURL") !== false){
    return $doesWordExist;
    } else {
        return false;
    }
    return $doesWordExist;
}


//en ny användare
function addOneUser(){
    //$jsonUser = file_get_contents("db.json");
    //$dataUser = json_decode($jsonUser, true);
}
?>

