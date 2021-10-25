<footer>
        <p><?php
        //inloggad? yees
        if (isset($_SESSION["isLoggedIn"])){
            echo "Logged in as: ";
            echo $_SESSION['user'];
        }
        ?></p>
        <p>2021 - The Internet Dog Database - Made By Matilda Nimvik</p>
    </footer>
</body>