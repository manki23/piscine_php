<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="home.css" />
        <title>Article</title>
    </head>
    <body>
        <header>
            <div class="class" id="sign">
                    <?php  if (isset($_SESSION['username'])){
                        echo "Welcome <strong>".$_SESSION['username']."!</strong> <a href=\"registration/change_psw.php\">Change password ?</a><br />";
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
                <div class="categories"><a id="readme" href="./romance.php">Romance</a></div>
                <div class="categories"><a id="readme" href="./sf.php">Science Fiction</a></div>
                <div class="categories"><a id="readme" href="./youth.php">Youth</a></div>
                <div class="categories"><a id="readme" href="./polar.php">Detective Story</a></div>
                <div class="categories"><a id="readme" href="./thriller.php">Thriller</a></div>
            </div>
        </header>
        <div class="class" id="page_article">
        <div id="article"><img src=https://i0.wp.com/pascesoirjelis.com/wp-content/uploads/2016/07/Orgueil-et-Pr%C3%A9jug%C3%A9s-couverture.jpg?fit=210%2C335&ssl=1" alt="romance" titre="oep" /></div>
        <div id="article"><div id="titre">Pride and Prejudice</div><br/>
            <div id="auteur">Jane Austen</div><br />
            <div id="texte">Pride and Prejudice is set in rural England in the early 19th century, and it follows the Bennet family, which includes five very different sisters. Mrs. Bennet is anxious to see all her daughters married, especially as the modest family estate is to be inherited by William Collins when Mr. Bennet dies. At a ball, the wealthy and newly arrived Charles Bingley takes an immediate interest in the eldest Bennet daughter, the beautiful and shy Jane. The encounter between his friend Darcy and Elizabeth is less cordial. Although Austen shows them intrigued by each other, she reverses the convention of first impressions: pride of rank and fortune and prejudice against the social inferiority of Elizabeth’s family hold Darcy aloof, while Elizabeth is equally fired both by the pride of self-respect and by prejudice against Darcy’s snobbery.</div><br />
            <div id="prix">28$</div><br />
            <div><a href="./registration/cart.php">Add to cart</a></div></div>
        </div>
    </body>
</html>