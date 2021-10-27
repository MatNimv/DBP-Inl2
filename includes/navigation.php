<?php
//är någon inloggad? no.
if (!isset($_SESSION["isLoggedIn"])){
    echo "
    <nav id='notLoggedIn'>
        <div class='signContainer'>
            <div id='toHome'>
                <p>
                    <span><a href='/index.php'>To</a></span>
                    <span><a href='/index.php'>the</a></span>
                    <span><a href='/index.php'>frontyard!</a></span>
                </p>
            </div>
        </div>
        <div class='signContainer'>
            <div id='toBackyard'>
                <p>
                    <span><a href='/list.php'>To</a></span>
                    <span><a href='/list.php'>the</a></span>
                    <span><a href='/list.php'>backyard!</a></span>
                </p>
            </div>
        </div>
        <div class='signContainer'>
            <div id='toInside'>
                <p>
                    <span><a href='/sign-in.php'>Unlock</a></span>
                    <span><a href='/sign-in.php'>the</a></span>
                    <span><a href='/sign-in.php'>door!</a></span>
                </p>
            </div>
        </div>
    </nav>
    ";
} else {
    //är någon inloggad? aye. ALLA navs
    echo "
    <nav id='isLoggedIn'>
        <div class='signContainer'>
            <div id='toHome'>
                    <p>
                        <span><a href='/index.php'>To</a></span>
                        <span><a href='/index.php'>the</a></span>
                        <span><a href='/index.php'>frontyard!</a></span>
                    </p>
                </div>
            </div>
        <div class='signContainer'>
            <div id='toBackyard'>
                <p>
                    <span><a href='/list.php'>To</a></span>
                    <span><a href='/list.php'>the</a></span>
                    <span><a href='/list.php'>backyard!</a></span>
                </p>
            </div>
        </div>
        <div class='signContainer'>
            <div id='toAdd'>
                <p>
                    <span><a href='/add.php'>Adopt</a></span>
                    <span><a href='/add.php'>a</a></span>
                    <span><a href='/add.php'>dog!</a></span>
                </p>
            </div>
        </div>
        <div class='signContainer'>
            <div id='toProfile'>
                <p>
                    <span><a href='/profile.php'>Meet</a></span>
                    <span><a href='/profile.php'>your</a></span>
                    <span><a href='/profile.php'>dogs!</a></span>
                </p>
            </div>
        </div>
    </nav>
";
}
?>