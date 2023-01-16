<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
        header("Location: index.php");
        exit;
        }
    // <<<_END
    // <H1>THIS IS SIMPE COIDEKJESABFGFSf</H1>
    // _END;
?>