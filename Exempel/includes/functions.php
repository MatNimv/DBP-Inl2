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

    //ALLA dogs tho.
    $allDogs = $data["dogs"];

    return $allDogs;
}


// - Hämta en hund från databasen för ägaren 
// med hjälp av owner: id och ägarens id




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
    echo $newDog["id"];
    //lägg till hund i db.json
    $data = json_decode(file_get_contents("db.json"), true);
    array_push($data["dogs"], $newDog);
    echo var_dump($newDog);
    $json = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents("db.json", $json);
}

//DOM för en hund.
function showOneDog($dogInfo){
    //koppla ihop användaren till sin hund
    $allUsers = getAllUsersDB();
    foreach($allUsers as $user){
        if($user["id"] == $dogInfo["id"]){
            $nameOfUser = $user['username'];
            break;
        } else {
            $nameOfUser = '<p>No owner.</p>';
        }
    }
    //variabel till GETLink funktionen
    $link = GETLink($dogInfo);

    $dogDiv = "<div class='oneDog'>
                <p class='name'><a href'link'{$dogInfo['name']}</a></p>
                <p class='breed'>{$dogInfo['breed']}</p>
                <p class='age'>{$dogInfo['age']}</p>
                <p class='notes'>{$dogInfo['notes']}</p>
                <p class='owner'>{$nameOfUser}</p>
            </div>";
    return $dogDiv;
}

//en ny användare
function addOneUser(){
    //$jsonUser = file_get_contents("db.json");
    //$dataUser = json_decode($jsonUser, true);


}

//särskild $_GET-länk till särskild hund
function GETLink($GETname){
    $link = header("Location: show.php?=$GETname");
    return $link;
}
?>

