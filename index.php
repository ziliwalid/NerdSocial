<?php
include_once 'Models/User.php';
session_start();

if (isset($_SESSION['clog'])){
    echo "<script>window.location.href='./GUI/Home.php'</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="container geekLogo">
                Welcome To <span class="geekSocTEXT"> GEEKSOCIAL<br></span>
            </div>

        </div>
        <div class="col">
            <div class="container-sm col-6">
                <form method="post" action="index.php">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="wa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="pass" class="form-control" id="exampleInputPassword1"><br>
                            <button type="submit" name="connection" value="connection" class="btn btn-danger">Connectez-vous</button><br>
                            Vous n'avez pas de compte ?<br> <a style="color: #fe302f" href="./">Inscrivez-vous</a>
                </form>
            </div>
            <?php
            if(!empty($_POST['connection']))
            {
                $mail=$_POST['wa'];
                $password=$_POST['pass'];

                $r=User::LogINGeek($_POST['wa'],$_POST['pass']);
                if($r==0)
                {
                    echo"<center><span class='error'>E-mail</span> ou <span class='error'>mot de pass</span> incorrect</center>";
                }
                else   {

                    session_start();
                    $_SESSION['clog']= $mail;
                    header("location:GUI/Home.php");

                }


            }
            ?>
        </div>
</div>

</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Smooch&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bungee+Shade&display=swap');
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
    span{
        font-weight: bold;
    }
    .container-sm{
        margin-top: 100px;
        padding: 5%;
        background: rgba(255, 255, 255, 0.4);
        border-radius: 5px;
        box-shadow: black;
    }
    .geekLogo{
        margin-top: 210px;
        margin-left:30% ;
        font-size: 60px;
    }
    .geekSocTEXT{
        font-family: 'Bungee Shade', cursive;
    }
    .error{
        color: red;
    }
</style>
