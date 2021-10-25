<?php
        //är någon inloggad? no.
            if (!isset($_SESSION["isLoggedIn"])){
                echo "
                    <div id='signContainer'>
                        <nav id='toBackyard'>
                            <p><span><a href='/list.php'>Look at </a></span> <span><a href='/list.php'>the dogs! </a></span></a></p>
                        </nav>
                    </div>
                ";
                echo "
                <div id='signContainer'>
                        <nav id='toInside'>
                            <p><a href='/sign-in.php'>Go Inside</a></p>
                        </nav>
                    </div>";
            } else {
                //är någon inloggad? aye.
                echo "
                    <div id='signContainer'>
                        <nav id='toBackyard'>
                        <p>
                            <span><a href='/list.php'>Look at </a></span>
                            <span><a href='/list.php'> at </a></span>
                            <span><a href='/list.php'>the</a></span></a>
                            <span><a href='/list.php'>dogs!</a></span>
                        </p>
                    </nav>
                    </div>";
                echo "
                    <div id='signContainer'>
                        <nav id='toProfile'>
                            <p>
                                <span><a href='/profile.php'>Your</a></span>
                                <span><a href='/profile.php'>dogs</a></span>
                            </p>
                        </nav>
                    </div>";
                    echo "
                    <div id='signContainer'>
                        <nav id='toAdd'>
                        <p>
                            <span><a href='/profile.php'>Adopt</a></span>
                            <span><a href='/profile.php'>a</a></span>
                            <span><a href='/profile.php'>dog</a></span>
                        </nav>
                        </p>
                    </div>";
                }
?>