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
                <div class="categories"><a id="cat" href="./sf.php">Science Fiction</a></div>
                <div class="categories"><a id="readme" href="./youth.php">Youth</a></div>
                <div class="categories"><a id="readme" href="./polar.php">Detective Story</a></div>
                <div class="categories"><a id="readme" href="./thriller.php">Thriller</a></div>
            </div>
        </header>
        <br />
        <div>
        <div class="livre"><img src="https://img.over-blog-kiwi.com/2/17/48/16/20161130/ob_2c7cdc_51l-sk1f5al-sx301-bo1-204-203-200.jpg" alt="sf" titre="gdvg"/>
                <div class="auteur"><div id="titre">The Hitchhiker's Guide to the Galaxy</div><br /><div id="auteur">Douglas Adams</div><br /><div>15$</div><br /><a href="#">Add to cart</a></div></div>
        </div>
    </body>
</html>
