<?php

    session_start();
    session_destroy();
    header('location:http://localhost/ams/main/index.php');
    
?>
