<?php 
	include 'server.php';
	session_start();


 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../home.css" />
        <title>Change password</title>
    </head>
    <body>
        <header>
            <div class="class" id="sign">

			<?php
			  if (isset($_SESSION['username'])){
    	echo "Welcome <strong>".$_SESSION['username']."!</strong><br />";
    	echo "<a href=\"../index.php?logout=\'1\'\">Sign out</a>";}
            else{
				header('location: ../index.php');}
				?>
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
		<div class="test">
  <div class="header">
	  <?PHP
	  echo "<h2>Welcome ".$_SESSION['username']."</h2>";
	  ?>
  </div>
	
  <form method="post" action="change_psw.php">
  	<div class="input-group">
  	  <label>Old password</label>
  	  <input type="password" name="oldpw" required=TRUE>
	  </div>
	  <div class="input-group">
  	  <label>New password</label>
  	  <input type="password" name="newpw_1" required=TRUE>
  	</div>
  	<div class="input-group">
  	  <label>Confirm new password</label>
  	  <input type="password" name="newpw_2" required=TRUE>
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="change_passwd">OK</button>
  	</div>
	  <?php include('errors.php'); ?>
  </form>
</div>
</body>
</html>