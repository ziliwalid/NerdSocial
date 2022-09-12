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
    public static function getPostData($id){
        $req="SELECT * from post where id='$id'";
        return Dataaccess::selection($req);
    }
    public static function insertComment($comment,$id,$name){
        $req="INSERT INTO `comment`(`commentDetail`, `postID`,`commentOwner`) VALUES ('$comment','$id','$name')";
        return Dataaccess::majour($req);
    }

    public static function getComment($postID){
        $req="SELECT commentDetail,commentOwner from comment c, post p where c.postID=p.id and c.postID='$postID' order by c.idComment desc ";
        return Dataaccess::selection($req);
    }
}