<?php

if (isset($_SESSION['logged']) === FALSE) {
    header("Location:  /gestionadministrativa/login.php");
    die();
}
?>