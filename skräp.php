<?php

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
    //variabel till GETLink funktionen
    //$linkName = GETLink($dogInfo["name"]);
    //$linkBreed = GETLink($dogInfo["breed"]);

    $dogDiv = "<div class='oneDog'>
                <p class='name'><a href='linkName'>{$dogInfo['name']}</a></p>
                <p class='breed'><a href='linkBreed'>{$dogInfo['breed']}</a></p>
                <p class='age'>{$dogInfo['age']}</p>
                <p class='notes'>{$dogInfo['notes']}</p>
                <p class='owner'>{$nameOfUser}</p>
            </div>";
    return $dogDiv;
}
    //måste ha INDEX av den särskilda hunden.
    $found = false; 
    foreach($allDogs as $key => $dog){
        if (4 == $dog["id"]){
            $found = true;
            break;
        }
        $data = json_decode(file_get_contents("db.json"), true);
        if ($found){
            unset($allDogs[$key]);
            break;
        }
    }

    $data = json_decode(file_get_contents("db.json"), true);
//måste ha INDEX av den särskilda hunden.
$found = false; 
foreach($allDogs as $key => $dog){

    echo '<pre>';
    echo var_dump($data["dogs"]);
    echo '</pre>';

    if ($dog["id"] == 2){
        $found = true;
        break;
    }
    $data = json_decode(file_get_contents("db.json"), true);
    if ($found){
        //array_splice($allDogs, $allDogs[$key], 1);
        unset($data["dogs"][$key]);
        break;
    }
    $json = json_encode($data["dogs"], JSON_PRETTY_PRINT);
    file_put_contents("db.json", $json);

    echo '<pre>';
    echo var_dump($data["dogs"]);
    echo '</pre>';
}

$json = file_get_contents("db.json");
$data = json_decode($json, true);

$manyDogs = $data["dogs"];

echo '<pre>';
echo var_dump($manyDogs);
echo '</pre>';

$found = false; 
foreach($manyDogs as $dog){
    if (2 == $dog["id"]){
        unset($dog["name"]);
        unset($dog["breed"]);
        unset($dog["age"]);
        unset($dog["notes"]);
        unset($dog["owner"]);
        unset($dog["id"]);
        break;
    }

    echo '<pre>';
    echo var_dump($manyDogs);
    echo '</pre>';

    $json = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents("db.json", $json);
}

//ta bort en hund för databasen. Denna actionen finns endast i profile.php.
function deleteDog($dogIDInfo){
    //tar ut datan från db.json
    $allDogs = getAllDogsDB();

    //måste ha INDEX av den särskilda hunden.
    $found = false; 
    foreach($allDogs as $key => $dog){
        if ($dogIDInfo == $dog["id"]){
            $found = true;
            break;
        }
        $data = json_decode(file_get_contents("db.json"), true);
        if ($found){ unset($allDogs[$key]);}

        $json = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents("db.json", $json);
    }



    //och byter tillbaka till profile.php
    header("Location: /profile.php");
    exit();
}

if (isset($_GET["id"])){
    $dogID = $_GET["id"];
    foreach($allDogs as $dog){
        if ($dogID !== $dog["id"]){
            echo '<p class="error">This dog does not exist</p>';
        }
    }  
}
//har vi breed i $_GET?
if (isset($_GET["breed"])){
    $breed = $_GET["breed"];

    foreach($allDogs as $dog){
        if ($breed == $dog["breed"]){
            echo showOneDog($dog);
            break;
        }
    }}


    function showDog($dogInfo){
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
            <p class='delete'><a href='delete.php?id={$dogInfo['id']}'>DELETE</a></p>
        </div>";
        } else { //om vi INTE är inne på profile. då ska vi 
            // inte kunna se delete knappen.
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
?>


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
        <p >{$nameOfUser}</p>
    </div>
</div>;