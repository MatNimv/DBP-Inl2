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

?>