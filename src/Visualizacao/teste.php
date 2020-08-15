<?php
    session_start();
    var_dump($_SESSION);

    function alert($texto) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
?>