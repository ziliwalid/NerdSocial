<?php
include_once '../../Models/Post.php';
/*getting data*/
$comment=$_POST['comment'];
$id=$_POST['id'];
$name=$_POST['commentor'];
Post::insertComment($comment,$id,$name);
/*sending the data*/
$displayData = Post::getComment($id);
while ($row = $displayData->fetch()){
    echo "<div class='container mt-4 commentSec'><span>$row[1]: </span><p>$row[0]</p></div>";
}