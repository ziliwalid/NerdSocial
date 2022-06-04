<?php
include_once '../Models/User.php';

$action = "index";
if (isset($_GET['action']))
    $action = $_GET['action'];
else if(isset($_POST['action']))
    $action = $_POST['action'];
switch ($action) {
    case "logout":
        session_start();
        unset($_SESSION["clog"]);
        header('location:../index.php');
        ;break;
}
