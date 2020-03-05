<?php include('server.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../home.css" />
        <title>Sign up</title>
    </head>
    <body>
        <header>
            <div class="class" id="sign">
			<?php  if (isset($_SESSION['username']))
					header('Location: ../index.php')?>
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
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p id="p">
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</div>
</body>
</html>