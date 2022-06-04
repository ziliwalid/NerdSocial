<?php

include_once '../Models/Post.php';

$action = "index";
if (isset($_GET['action']))
    $action = $_GET['action'];
else if (isset($_POST['action']))
    $action = $_POST['action'];
switch ($action) {
    case "posting":
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../images/".$filename;
        copy($tempname,$folder);
        Post::PostingApost($_POST['id'],$_POST['content'],$filename,$_POST['subject'],$_POST['title']);
        header('location:../GUI/Home.php');
        break;
}

