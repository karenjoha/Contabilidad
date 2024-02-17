<?php

if (isset($_SESSION['logged']) === FALSE) {
    header("Location:  /contabilidad/login.php");
    die();
}
?>