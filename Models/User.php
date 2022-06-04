<?php
include_once __dir__.'/../Dataaccess/Dataaccess.php';

class User
{
    public static function LogINGeek($mail,$mdp){
        $req="select * from user where mail='$mail' and mdp='$mdp' ";
        $cur=Dataaccess::selection($req);
        return $cur->rowCount();
    }
    public static function getNameAndID($mail){
        $req="select id, prenom from user where mail='$mail' ";
        return Dataaccess::selection($req);
    }

}