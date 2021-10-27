<?php
require_once "includes/functions.php";
        //är någon inloggad? no.
            if (!isset($_SESSION["isLoggedIn"])){
                if(checkIfURL("list")){
                    //på list.php
                    echo "
                    <div id='signContainer'>
                            <nav id='toHomeFromList'>
                            <p>
                                <span><a href='/index.php'>To</a></span>
                                <span><a href='/index.php'>the</a></span>
                                <span><a href='/index.php'>frontyard!</a></span>
                            </p>
                            </nav>
                        </div>";
                        echo "
                        <div id='signContainer'>
                                <nav id='toInsideFromList'>
                                <p>
                                    <span><a href='/sign-in.php'>Unlock</a></span>
                                    <span><a href='/sign-in.php'>the</a></span>
                                    <span><a href='/sign-in.php'>door!</a></span>
                                </p>
                                </nav>
                            </div>";
                } elseif(checkIfURL("show")) {
                    echo "
                    <div id='signContainer'>
                            <nav id='toHomeFromShow'>
                            <p>
                                <span><a href='/index.php'>To</a></span>
                                <span><a href='/index.php'>the</a></span>
                                <span><a href='/index.php'>frontyard!</a></span>
                            </p>
                            </nav>
                        </div>";
                        echo "
                        <div id='signContainer'>
                                <nav id='toInsideFromShow'>
                                <p>
                                    <span><a href='/sign-in.php'>Unlock</a></span>
                                    <span><a href='/sign-in.php'>the</a></span>
                                    <span><a href='/sign-in.php'>door!</a></span>
                                </p>
                                </nav>
                            </div>";
                }else {
                    echo "
                    <div id='signContainer'>
                            <nav id='toInsideFromHome'>
                            <p>
                                <span><a href='/sign-in.php'>Unlock</a></span>
                                <span><a href='/sign-in.php'>the</a></span>
                                <span><a href='/sign-in.php'>door!</a></span>
                            </p>
                            </nav>
                        </div>";
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
                    </div>
                ";
                }
            } else {//är någon inloggad? aye.
                //på list.php
                if(checkIfURL("list")){
                    echo "
                    <div id='signContainer'>
                            <nav id='toHomeFromList'>
                            <p>
                            <span><a href='/index.php'>To</a></span>
                            <span><a href='/index.php'>the</a></span>
                            <span><a href='/index.php'>frontyard!</a></span>
                            </p>
                            </nav>
                        </div>";
                    echo "
                    <div id='signContainer'>
                        <nav id='toProfileFromList'>
                            <p>
                                <span><a href='/profile.php'>Your</a></span>
                                <span><a href='/profile.php'>dogs</a></span>
                            </p>
                        </nav>
                    </div>";
                    echo "
                    <div id='signContainer'>
                        <nav id='toAddFromList'>
                        <p>
                            <span><a href='/add.php'>Adopt</a></span>
                            <span><a href='/add.php'>a</a></span>
                            <span><a href='/add.php'>dog</a></span>
                        </nav>
                        </p>
                    </div>";
                } elseif(checkIfURL("show")) {
                    echo "
                    <div id='signContainer'>
                            <nav id='toHomeFromShow'>
                            <p>
                                <span><a href='/index.php'>To</a></span>
                                <span><a href='/index.php'>the</a></span>
                                <span><a href='/index.php'>frontyard!</a></span>
                            </p>
                            </nav>
                        </div>";
                        echo "
                        <div id='signContainer'>
                                <nav id='toInsideFromShow'>
                                <p>
                                    <span><a href='/sign-in.php'>Unlock</a></span>
                                    <span><a href='/sign-in.php'>the</a></span>
                                    <span><a href='/sign-in.php'>door!</a></span>
                                </p>
                                </nav>
                            </div>";
                            echo "
                            <div id='signContainer'>
                                <nav id='toProfileFromShow'>
                                    <p>
                                        <span><a href='/profile.php'>Your</a></span>
                                        <span><a href='/profile.php'>dogs</a></span>
                                    </p>
                                </nav>
                            </div>";
                            echo "
                            <div id='signContainer'>
                                <nav id='toAddFromShow'>
                                <p>
                                    <span><a href='/add.php'>Adopt</a></span>
                                    <span><a href='/add.php'>a</a></span>
                                    <span><a href='/add.php'>dog</a></span>
                                </nav>
                                </p>
                            </div>";
                } else{
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
                            <span><a href='/add.php'>Adopt</a></span>
                            <span><a href='/add.php'>a</a></span>
                            <span><a href='/add.php'>dog</a></span>
                        </nav>
                        </p>
                    </div>";
                }
            }
?>