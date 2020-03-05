<?PHP
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../home.css" />
        <title>Cart</title>
    </head>
    <body>
        <header>
            <div class="class" id="sign">
            <?php  if (isset($_SESSION['username'])){
    	echo "Welcome <strong>".$_SESSION['username']."!</strong><a href=\"./change_psw.php\">Change password ?</a><br />";
    	echo "<a href=\"../index.php?logout=\'1\'\">Sign out</a>";}
            else{
                echo "<a href=\"./login.php\">Sign in</a>";
                echo "<br />";
                echo "<a href=\"./register.php\">Sign up</a>";
                echo "<br />";}?>
            </div>
            <h3><?php echo $_SESSION['cart']['item'];?></h3>
            <a href="./cart.php"><img class="class" id="panier" src="https://cdn3.iconfinder.com/data/icons/farm-and-nature/512/Farm_Basket-512.png" alt="panier" title="panier"></a>
            <h1><a id="readme" href="../index.php">Read Me</a></h1>
            <div id="categorie">
                <div class="categories"><a id="readme" href="../categories/romance.php">Romance</a></div>
                <div class="categories"><a id="readme" href="../categories/sf.php">Science Fiction</a></div>
                <div class="categories"><a id="readme" href="../categories/youth.php">Youth</a></div>
                <div class="categories"><a id="readme" href="../categories/polar.php">Detective Story</a></div>
                <div class="categories"><a id="readme" href="../categories/thriller.php">Thriller</a></div>
            </div>
        </header>
        <br />
        <div class="test">
  <div class="header">
  	<h2>Cart</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
        <table>
            <tr>
                <th>Book informations</th>
                <th>Quantity</th>
                <th>Price</th>
                <td id="non"></td>
            </tr>
            <tr>
                <td><img class="mini" src=https://i0.wp.com/pascesoirjelis.com/wp-content/uploads/2016/07/Orgueil-et-Pr%C3%A9jug%C3%A9s-couverture.jpg?fit=210%2C335&ssl=1" alt="romance" titre="oep" /><div class="minitext"><b>Pride and Prejudice</b><br /><i>Jane Austen</i><br />28$</div></td>
                <td><input id="quantity" type="number" name="quantity" min="0" max="100" step="1" value="1"/></td>
                <td class="price_tab">28$</td>
                <td id="form_db"><button type="button">OK</button></td>
            </tr>
        </table>
        <div id="form_db">
        <a href="../index.php">Valider !</a>
            </div>
            </div>
  </form>
</div>
    </body>
</html>