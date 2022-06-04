<?php
include_once '../Models/User.php';
include_once '../Models/Post.php';
session_start();
$mail=$_SESSION['clog'];
$ClientData=User::getNameAndID($mail);
while ($row = $ClientData->fetch()){
    $id=$row[0];
    $name=$row[1];
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GEEKSOCIAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light  mt-4 ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><span>GeekSocial</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class="nav-item dropdown" id="name">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bonjour <?=$name?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                       <!-- <li><a class="dropdown-item" href="./Gui/BoughtItems.php">My Games</a></li>
                        <li><hr class="dropdown-divider"></li>-->
                        <li><a class="dropdown-item active" href="../Traitement/TraitementClient.php?action=logout">Logout</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</nav>

<div class="container creatPost mt-3" id="navbar">
    <h4>Did you learn something new? Share it!</h4>
    <a href="CreatePost.php?id=<?=$id?>" class="btn btn-outline-primary">Share with us what you learned <i class="fa-solid fa-cat"></i></a>
</div>


<!--cards-->
<div class="container" style="max-height:100%;overflow:auto;">
    <?php
        $displayData = Post::showData();
        while ($row = $displayData->fetch()){
    ?>


    <div class="cards" onclick="window.location.href='./GUI/test.php'">
        <div class="card__header">
            <img src="../images/<?=$row[4]?>" alt="card__image" class="card__image" width="600">
        </div>
        <div class="card__body">
            <span class="tag tag-blue"><?=$row[5]?></span>
            <h4><?=$row[6]?></h4>
            <p><?=$row[3]?></p>
        </div>
        <div class="card__footer">
            <div class="user">
                <img src="https://i.pravatar.cc/40?img=1" alt="user__image" class="user__image">
                <div class="user__info">
                    <h5>Jane Doe</h5>
                    <small>2h ago</small>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>

</div>
<script>

</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>



<style>
    @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap");
    @import url('https://fonts.googleapis.com/css2?family=Bungee+Shade&display=swap');

    *,
    *::before,
    *::after {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    .navbar{
        border-radius: 5px;
    }
    body {
        font-family: "Quicksand", sans-serif;
        display: grid;
        place-items: center;
        height: 100vh;
        background: #7f7fd5;
        background: linear-gradient(to right, #91eae4, #86a8e7, #7f7fd5);
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        max-width: 1200px;
        margin-block: 2rem;
        gap: 2rem;
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
    .container::-webkit-scrollbar {
        display: none;
    }

    img {
        max-width: 100%;
        display: block;
        object-fit: cover;
    }

    .cards {
        display: flex;
        flex-direction: column;
        width: clamp(20rem, calc(20rem + 2vw), 22rem);
        overflow: hidden;
        box-shadow: 0 .1rem 1rem rgba(0, 0, 0, 0.1);
        border-radius: 1em;
        transition: transform .2s; /* Animation */
        background: #ECE9E6;
        background: linear-gradient(to right, #FFFFFF, #ECE9E6);

    }

    .cards:hover{
        transform: scale(1.1);
        cursor: pointer;
    }



    .card__body {
        padding: 1rem;
        display: flex;
        flex-direction: column;
        gap: .5rem;
    }
    .creatPost{
        background: aliceblue;
        border-radius: 5px;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        gap: .5rem;
        width: clamp(20rem, calc(20rem + 2vw), 22rem);
        overflow: hidden;
        box-shadow: 0 .1rem 1rem rgba(0, 0, 0, 0.1);
    }


    .tag {
        align-self: flex-start;
        padding: .25em .75em;
        border-radius: 1em;
        font-size: .75rem;
    }

    .tag + .tag {
        margin-left: .5em;
    }

    .tag-blue {
        background: #56CCF2;
        background: linear-gradient(to bottom, #2F80ED, #56CCF2);
        color: #fafafa;
    }

    .tag-brown {
        background: #D1913C;
        background: linear-gradient(to bottom, #FFD194, #D1913C);
        color: #fafafa;
    }

    .tag-red {
        background: #cb2d3e;
        background: linear-gradient(to bottom, #ef473a, #cb2d3e);
        color: #fafafa;
    }

    .card__body h4 {
        font-size: 1.5rem;
        text-transform: capitalize;
    }

    .card__footer {
        display: flex;
        padding: 1rem;
        margin-top: auto;
    }

    .user {
        display: flex;
        gap: .5rem;
    }

    .user__image {
        border-radius: 50%;
    }

    .user__info > small {
        color: #666;
    }
    span{
        font-family: 'Bungee Shade', cursive;
    }
    .sticky {
        position: fixed;
        top: 0;
    }

</style>