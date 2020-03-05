<?PHP
include 'registration/server.php';
session_start(); 

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
}
if (!isset($_SESSION['cart']))
{
    $_SESSION['cart']['item'] = 0;
    $_SESSION['cart']['price'] = array();
    $_SESSION['cart']['quantity'] = array();
    $_SESSION['cart']['name'] = array();
    $_SESSION['cart']['author'] = array();
    $_SESSION['cart']['img'] = array();
    //price
    array_push($_SESSION['cart']['price'], "28.00$");
    array_push($_SESSION['cart']['price'], "15.00$");
    array_push($_SESSION['cart']['price'], "20.00$");
    array_push($_SESSION['cart']['price'], "8.99$");
    array_push($_SESSION['cart']['price'], "20.00$");
    //quantity
    array_push($_SESSION['cart']['quantity'], '0');
    array_push($_SESSION['cart']['quantity'], '0');
    array_push($_SESSION['cart']['quantity'], '0');
    array_push($_SESSION['cart']['quantity'], '0');
    array_push($_SESSION['cart']['quantity'], '0');
    //author
    array_push($_SESSION['cart']['author'], 'Jane Austen');
    array_push($_SESSION['cart']['author'], 'Douglas Adams');
    array_push($_SESSION['cart']['author'], 'Marcus Pfister');
    array_push($_SESSION['cart']['author'], 'Fred Vargas');
    array_push($_SESSION['cart']['author'], 'Franck Thilliez');
    //name
    array_push($_SESSION['cart']['name'], 'Pride and Prejudice');
    array_push($_SESSION['cart']['name'], 'The Hitchhiker\'s Guide to the Galaxy');
    array_push($_SESSION['cart']['name'], 'The Rainbow Fish');
    array_push($_SESSION['cart']['name'], 'The Poison Will Remain');
    array_push($_SESSION['cart']['name'], 'Sharko');
    //img
    array_push($_SESSION['cart']['img'], 'https://i0.wp.com/pascesoirjelis.com/wp-content/uploads/2016/07/Orgueil-et-Pr%C3%A9jug%C3%A9s-couverture.jpg?fit=210%2C335&ssl=1');
    array_push($_SESSION['cart']['img'], 'https://img.over-blog-kiwi.com/2/17/48/16/20161130/ob_2c7cdc_51l-sk1f5al-sx301-bo1-204-203-200.jpg" alt="sf" titre="gdvg');
    array_push($_SESSION['cart']['img'], 'https://images-na.ssl-images-amazon.com/images/I/91DRszvvh0L.jpg');
    array_push($_SESSION['cart']['img'], 'https://images-na.ssl-images-amazon.com/images/I/41jlqC5L%2BML._SX307_BO1,204,203,200_.jpg');
    array_push($_SESSION['cart']['img'], 'http://www.images-chapitre.com/ima0/original/198/75488198_14658327.jpg');
}
if (isset($_GET['add_to_cart_0']))
{
    $_SESSION['cart']['item'] += 1;
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="home.css" />
        <title>Home page</title>
    </head>
    <body>
        <header>
            <div class="class" id="sign">
            <?php  if (isset($_SESSION['username'])){
    	echo "Welcome <strong>".$_SESSION['username']."!<br/></strong> <a href=\"registration/change_psw.php\">Change password ?</a><br />";
    	echo "<a href=\"index.php?logout=\'1\'\">Sign out</a>";}
            else{
                echo "<a href=\"registration/login.php\">Sign in</a>";
                echo "<br />";
                echo "<a href=\"registration/register.php\">Sign up</a>";
                echo "<br />";}?>
            </div>
            <h3><?php echo $_SESSION['cart']['item'];?></h3>
            <a href="./registration/cart.php"><img class="class" id="panier" src="https://cdn3.iconfinder.com/data/icons/farm-and-nature/512/Farm_Basket-512.png" alt="panier" title="panier"></a>
            <h1><a id="readme" href="index.php">Read Me</a></h1>
            <div id="categorie">
                <div class="categories"><a id="readme" href="./categories/romance.php">Romance</a></div>
                <div class="categories"><a id="readme" href="./categories/sf.php">Science Fiction</a></div>
                <div class="categories"><a id="readme" href="./categories/youth.php">Youth</a></div>
                <div class="categories"><a id="readme" href="./categories/polar.php">Detective Story</a></div>
                <div class="categories"><a id="readme" href="./categories/thriller.php">Thriller</a></div>
            </div>
        </header>
        <br />
        <div>
            <div class="livre"><img src=https://i0.wp.com/pascesoirjelis.com/wp-content/uploads/2016/07/Orgueil-et-Pr%C3%A9jug%C3%A9s-couverture.jpg?fit=210%2C335&ssl=1" alt="romance" titre="oep" />
                <div class="auteur"><div id="titre"><a href="page_orgueil.php">Pride and Prejudice</a></div><br /><div id="auteur">Jane Austen</div><br /><div>28$</div><br /><a name="add_to_cart_0" href="registration/cart.php">Add to cart</a></div></div>
            <div class="livre"><img src="https://img.over-blog-kiwi.com/2/17/48/16/20161130/ob_2c7cdc_51l-sk1f5al-sx301-bo1-204-203-200.jpg" alt="sf" titre="gdvg"/>
                <div class="auteur"><div id="titre">The Hitchhiker's Guide to the Galaxy</div><br /><div id="auteur">Douglas Adams</div><br /><div>15$</div><br /><a name="add_to_cart_1" href="#">Add to cart</a></div></div>
            <div class="livre"><img src="https://images-na.ssl-images-amazon.com/images/I/91DRszvvh0L.jpg" alt="youth" titre="aec"/>
                <div class="auteur"><div id="titre">The Rainbow Fish</div><br /><div id="auteur">Marcus Pfister</div><br /><div>20$</div><br /><a name="add_to_cart_2" href="#">Add to cart</a></div></div>
            <div class="livre"><img src="https://images-na.ssl-images-amazon.com/images/I/41jlqC5L%2BML._SX307_BO1,204,203,200_.jpg" alt="polar" titre="lr"/>
                <div class="auteur"><div id="titre">The Poison Will Remain</div><br /><div id="auteur">Fred Vargas</div><br /><div>8,99$</div><br /><a href="#">Add to cart</a></div></div>
            <div class="livre"><img src="http://www.images-chapitre.com/ima0/original/198/75488198_14658327.jpg" alt="thriller" titre="s"/>
                <div class="auteur"><div id="titre">Sharko</div><br /><div id="auteur">Franck Thilliez</div><br /><div>20$</div><br /><a href="#">Add to cart</a></div></div>
            </div>
    </body>
</html>
