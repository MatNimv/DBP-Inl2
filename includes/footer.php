<?php
// Avslutande HTML (sidfot, etc.)
?>
</main>

<footer>
        <p>2021 - The Internet Dog Database </p>
        <p><?php
        //inloggad? yees
        if (isset($_SESSION["isLoggedIn"])){
            echo "| Logged in as: ";
            echo $_SESSION['user'];
        }
        ?></p>
    </footer>
</body>