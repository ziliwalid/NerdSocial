<?php
include_once '../Models/User.php';

session_start();
$mail=$_SESSION['clog'];
$ClientData=User::getNameAndID($mail);
$id=$_GET['id'];
while ($row = $ClientData->fetch()){
    $name=$row[1];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creating a Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container">
    <div class="cardHead">
        <h2>Hey <span class="name"><?=$name?></span>, what did you learn ?</h2>
    </div>
    <form method="post" action="../Traitement/TraitementPost.php?" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s6">
                <input name="title" id="last_name" type="text" class="validate">
                <input value="<?=$id?>" name="id" hidden>
                <label for="last_name">Title</label>
            </div>
            <div class="input-field col s6">
                    <input name="subject" id="last_name" type="text" class="validate">
                    <label for="last_name">Subject</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <textarea name="content" id="textarea1" class="materialize-textarea"></textarea>
                <label for="textarea1">Content</label>
            </div>

                <div class="file-field input-field col s6">
                    <div class="btn">
                        <span>Image</span>
                        <input name="uploadfile" type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" readonly>
                    </div>
                </div>
        </div>
        <div class="row">
            <center>
                    <button class="btn waves-effect waves-light" type="submit" name="action" value="posting">Share your Journey
                        <i class="fa-solid fa-cat"></i>
                    </button>
            </center>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');

    .container{
        padding: 2%;
        background: aliceblue;
        margin-top: 5%;
        margin-bottom: 5%;
        border-radius: 5px;
    }
    .cardHead{
        padding-bottom: 5%;
        font-weight: lighter;
    }
    .name{
        color: #f41c4e;
        font-weight: bolder;
        font-family: 'Roboto', sans-serif;
    }
    body {
        background: linear-gradient(270deg, #0bd8d6, #f41c4e);
        background-size: 400% 400%;

        -webkit-animation: bodyColors 30s ease infinite;
        -moz-animation: bodyColors 30s ease infinite;
        animation: bodyColors 30s ease infinite;
    }

    @-webkit-keyframes bodyColors {
        0%{background-position:0% 50%}
        50%{background-position:100% 50%}
        100%{background-position:0% 50%}
    }
    @-moz-keyframes bodyColors {
        0%{background-position:0% 50%}
        50%{background-position:100% 50%}
        100%{background-position:0% 50%}
    }
    @keyframes bodyColors {
        0%{background-position:0% 50%}
        50%{background-position:100% 50%}
        100%{background-position:0% 50%}
    }
</style>