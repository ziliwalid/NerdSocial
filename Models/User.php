<?php
include_once __dir__.'/../Dataaccess/Dataacess.php';

class User
{
    public static function LogINGeek($mail,$mdp){
        $req="select * from user where mail='$mail' and mdp='$mdp' ";
        $cur=Dataacess::selection($req);
        return $cur->rowCount();
    }
    public static function getNameAndID($mail){
        $req="select id, prenom from user where mail='$mail' ";
        return Dataacess::selection($req);
    }

}