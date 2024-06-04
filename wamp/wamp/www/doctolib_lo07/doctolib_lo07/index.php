<?php
session_start();
$_SESSION['login']='';
$_SESSION["id"]='';

header('Location: app/router/router2.php?action=truc');

?>