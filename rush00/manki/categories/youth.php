<?php
session_start(); 

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../home.css" />
        <title>Home page</title>
    </head>
    <body>
        <header>
            <div class="class" id="sign">
            <?php  if (isset($_SESSION['username'])){
    	echo "Welcome <strong>".$_SESSION['username']."!<br/></strong> <a href=\"../registration/change_psw.php\">Change password ?</a><br />";
    	echo "<a href=\"../index.php?logout=\'1\'\">Sign out</a>";}
            else{
                echo "<a href=\"../registration/login.php\">Sign in</a>";
                echo "<br />";
                echo "<a href=\"../registration/register.php\">Sign up</a>";
                echo "<br />";}?>
            </div>
            <h3><?php echo $_SESSION['cart']['item'];?></h3>
            <a href="../registration/cart.php"><img class="class" id="panier" src="https://cdn3.iconfinder.com/data/icons/farm-and-nature/512/Farm_Basket-512.png" alt="panier" title="panier"></a>
            <h1><a id="readme" href="../index.php">Read Me</a></h1>
            <div id="categorie">
                <div class="categories"><a id="readme" href="./romance.php">Romance</a></div>
                <div class="categories"><a id="readme" href="./sf.php">Science Fiction</a></div>
                <div class="categories"><a id="cat" href="./youth.php">Youth</a></div>
                <div class="categories"><a id="readme" href="./polar.php">Detective Story</a></div>
                <div class="categories"><a id="readme" href="./thriller.php">Thriller</a></div>
            </div>
        </header>
        <br />
        <div>
        <div class="livre"><img src="https://images-na.ssl-images-amazon.com/images/I/91DRszvvh0L.jpg" alt="youth" titre="aec"/>
                <div class="auteur"><div id="titre">The Rainbow Fish</div><br /><div id="auteur">Marcus Pfister</div><br /><div>20$</div><br /><a href="#">Add to cart</a></div></div>
        </div>
    </body>
</html>
