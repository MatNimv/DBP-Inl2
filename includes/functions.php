<?php
error_reporting(-1);

//Hämtar alla användare från DB
function getAllUsersDB(){
    $json = file_get_contents("db.json");
    $data = json_decode($json, true);

    //ALLA användare tho.
    $allUsers = $data["users"];
    return $allUsers;
}

//Hämta alla hundar från databasen
function getAllDogsDB(){
    $json = file_get_contents("db.json");
    $data = json_decode($json, true);

    $allDogs = $data["dogs"];

    return $allDogs;
}

//Lägg till en ny hund i databasen
function addDog($postInfo){
    //nycklar för den nya hunden, från $_POST
    $newDog = [
        "name" => $postInfo["dogName"],
        "breed" => $postInfo["breed"],
        "age" => $postInfo["age"],
        "notes" => $postInfo["notes"]
    ];
    //denna foreachen räknar ut den nya 
    //hundens id utifrån vilka som redan finns
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

//ta bort specifik hund från databasen
function deleteDog($dogID){
    $manyDogs = getAllDogsDB();

    $found = false;
    foreach($manyDogs as $key => $dog){
        if ($dogID == $dog["id"]){
            $found = true;
            $index = $key;
            break;
        }
    }
    if ($found){
        $data = json_decode(file_get_contents("db.json"), true);
        unset($data["dogs"][$index]);
        $json = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents("db.json", $json);
    }

    //och byter tillbaka till profile.php
    header("Location: /profile.php");
    exit();
}

//DOM för en (1) hund.
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
        $dogDiv = "
        <div class='oneDog'>    
            <div class='name'>
                <p>NAME</p>
                <p><a href='show.php?id={$dogInfo['id']}'>{$dogInfo['name']}</a></p>
            </div>
            <div class='breed'>
                <p>BREED</p>
                <p><a href='list.php?breed={$dogInfo['breed']}'>{$dogInfo['breed']}</a></p>
            </div>
            <div class='age'>
                <p>AGE</p>
                <p >{$dogInfo['age']}</p>
            </div>
            <div class='notes'>
                <p>NOTES</p>
                <p >{$dogInfo['notes']}</p>
            </div>
            <div class='owner'>
                <p>OWNER</p>
                <p>{$nameOfUser}</p>
            </div>
            <div class='delete'>
                <p>ACTION</p>
                <p><a href='delete.php?id={$dogInfo['id']}'>DELETE</a></p>
            </div>
        </div>";
    } else {//om vi INTE är inne på profile. då ska vi 
        //inte kunna se delete knappen.
        $dogDiv = "
        <div class='oneDog' style='grid-template-columns: repeat(5, 1fr);'>
            <div class='name'>
                <p>NAME</p>
                <p><a href='show.php?id={$dogInfo['id']}'>{$dogInfo['name']}</a></p>
            </div>
            <div class='breed'>
                <p>BREED</p>
                <p><a href='list.php?breed={$dogInfo['breed']}'>{$dogInfo['breed']}</a></p>
            </div>
            <div class='age'>
                <p>AGE</p>
                <p >{$dogInfo['age']}</p>
            </div>
            <div class='notes'>
                <p>NOTES</p>
                <p >{$dogInfo['notes']}</p>
            </div>
            <div class='owner'>
                <p>OWNER</p>
                <p >{$nameOfUser}</p>
            </div>
        </div>";
    }
    return $dogDiv;
}

//kollar efter särskild URL.
function checkIfURL($stringInURL){
    if (strpos($_SERVER['REQUEST_URI'], "$stringInURL") !== false){
    return true;
    } else {
        return false;
    }
}

?>

