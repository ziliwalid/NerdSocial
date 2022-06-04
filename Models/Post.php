<?php
include_once __dir__.'/../Dataaccess/Dataaccess.php';

class Post
{
    public static function showData(){
        $req="select * from post";
        return Dataaccess::selection($req);
    }
    public static function PostingApost($id,$content,$image,$type,$title){
        $req="INSERT INTO `post`(`user_id`, `content`, `image`, `type`, `title`) VALUES ('$id','$content','$image','$type','$title')";
        return Dataaccess::majour($req);
    }
}