
<?PHP
//!\ The PHP part needs to be before the html one in order for the db_function to work !
session_start();
$errors = array();
include 'db_install_funct.php';
?>
<html>
<head>
  <title>Admin</title>
  <link rel="stylesheet" type="text/css" href="../home.css">
</head>
<body>
<header>
            <div class="class" id="sign">
            <?php  if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin'){
    	echo "Welcome <strong>".$_SESSION['username']."!<br/></strong> <a href=\"change_psw.php\">Change password ?</a><br />";
    	echo "<a href=\"../index.php?logout=\'1\'\">Sign out</a>";}
            else{ 
                header('Location: ../index.php');
            }?>
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
  <div class="header">
  	<h2>Database</h2>
  </div>
	
  <form class="database" method="post" action="create_db.php">
      <?php include('errors.php'); ?>
      <table id="form_db"><tr><td>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="create_db_table">Create Database</button>
      </div></td><td>
      <div class="input-group">
  	  <button type="submit" class="btn" name="fill_db_table">Fill Database</button>
      </div></td><td>
      <div class="input-group">
        <button type="submit" class="btn" name="drop_db_table">Delete Database</button>
</div></td></tr><tr>
<td>
<div class="input-group">
  	  <button type="submit" class="btn" name="book_db_table">See inside book_table</button>
      </div></td><td>
      <div class="input-group">
        <button type="submit" class="btn" name="category_db_table">See inside category_table</button>
      </div></td><td>
      <div class="input-group">
  	  <button type="submit" class="btn" name="user_db_table">See inside user_table</button>
      </div></td></tr></table>
    </form>
</body>
</html>

<?PHP
echo "<BR /><BR />";
//Button to create the database and its tables
if (isset($_POST['create_db_table']))
{
    ft_create_table();
}



//button to fill the database with enough values for our website
if (isset($_POST['fill_db_table']))
{
    ft_fill_table();
}


if (isset($_POST['drop_db_table']))
{
    ft_reset_db();
}

include 'db_functions.php';
if (isset($_POST['book_db_table']))
{
    ft_display_book();
}

if (isset($_POST['category_db_table']))
{
    ft_display_category();
}

if (isset($_POST['user_db_table']))
{
    ft_display_user();
}

?>
