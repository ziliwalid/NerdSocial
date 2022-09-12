<?php
include_once '../Models/Post.php';
include_once '../Models/User.php';
?>
<html>
<head>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style/style4.css"><!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<body>
<?php
session_start();
$mail=$_SESSION['clog'];
$ClientData=User::getNameAndID($mail);
while ($row = $ClientData->fetch()){
    $name=$row[1];
}
$id=$_GET['id'];
/*Getting the name of the poster*/
$displaydata=Post::getPostData($id);
while ($row = $displaydata ->fetch()){?>
<div class="content-div" id="ires">
    <div class='container mt-4'>
                                                <div class='card-deck'>
                                                            <div class='card wow animated fadeInLeft'>

                                                                <div class='row'>
                                                                    <div class='col-md-3'>

                                                                    <img src='../images/<?=$row[4]?>' class='img-fluid'>
                                                                    </div>

                                                                    <div class='col-md-7'>
                                                                    <h2 class='card-title mt-3'><?=$row[6]?></h2>
                                                                    <p>Par <strong class='vendeur'><?=$name?></strong> </P><a>
                                                                            <p><?=$row[3]?></p>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                        </div>

                                            </div>
    <?php
    }
    ?>
    <div class="container mt-5 a">
        <form id="commentForm" method="POST" class="ajax">
        <div class="input-group mb-3">
            <input name="comment" type="text" class="form-control" id="commentA" placeholder="Write your comment here" aria-label="Recipient's username" aria-describedby="button-addon2">
            <input name="id" id="productID" value="<?=$id?>" hidden>
            <input id="name" value="<?=$name?>" hidden>
            <button class="btn btn-outline-dark" id="but">comment</button>
        </div>
    </form>
    </div>
<div id="commentBar" class="commentSection" style="max-height:100%;overflow:auto;">
    <?php
    $displayData = Post::getComment($id);
    while ($row = $displayData->fetch()){
        echo "<div class='container mt-4 commentSec'><span>$row[1]: </span><p>$row[0]</p></div>";
    }
    ?>
</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("#commentForm").submit(function (e){
        e.preventDefault();
        let commentSec = $("#commentA").val();
        let idProd = $("#productID").val();
        let commentOwner = $("#name").val()
        $.ajax({
            type: "POST",
            url: "AjaxResponse/Response.php",
            data:{
                comment : commentSec,
                id : idProd,
                commentor: commentOwner
            }
        }).done(function(response) {
           $("#commentBar").html(response);
        });
    })
</script>
</html>

<style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }
    body {
        font-family: "Quicksand", sans-serif;
        display: grid;
        place-items: center;
        height: 100vh;
        background: #7f7fd5;
        background: linear-gradient(to right, #91eae4, #86a8e7, #7f7fd5);
    }
    .content-div
    {
        border-radius: 10px;
        margin-top: 20%;
    }
    .a{
        background: rgba(255, 255, 255, 0.29);
        padding: 0.5%;
        border-radius: 5px;
        box-shadow: #9ca3af;
    }
    .commentSec{
        background: white;
        border-radius: 5px;

    }
    .commentSection{
        max-width: 1200px;
        margin-block: 2rem;
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    /*pour cacher le scrollbar*/
    .commentSection::-webkit-scrollbar {
        display: none;
    }
    span{
        font-weight: bold;
        color: red;
    }

</style>