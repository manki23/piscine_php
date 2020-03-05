<?PHP
session_start();
$errors = array();

function ft_reset_db()
{
    $db = mysqli_connect('localhost', 'root', 'rootroot');
    if (!mysqli_query($db, "DROP DATABASE rush00"))
        array_push($errors, "Error while deleting database & tables");
        mysqli_close($mysqli);
}

function ft_create_table()
{
    // connect to the database
    $db = mysqli_connect('localhost', 'root', 'rootroot');
    $db_init_rush00 = "CREATE DATABASE IF NOT EXISTS rush00";
    if (!mysqli_query($db, $db_init_rush00))
        array_push($errors, "Error creating database");
    mysqli_select_db($db, 'rush00');
    //Declaration of USER_TABLE
    //=> two user must have differents id and name, hence this primary key
    $db_init_user = "CREATE TABLE IF NOT EXISTS `user_table` (
        `user_id` int(11) NOT NULL AUTO_INCREMENT,
        `user_name` varchar(255) NOT NULL,
        `user_passwd` varchar(255) NOT NULL,
        PRIMARY KEY (user_id, user_name),
        UNIQUE (user_id, user_name)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
    //Decaration of CATEGORY_TABLE
    //=> two differents category can't have the same id nor the same name, hense the primary key
    $db_init_category ="CREATE TABLE IF NOT EXISTS `category_table` (
        `cat_id` int(11) NOT NULL UNIQUE AUTO_INCREMENT,
        `cat_name` varchar(255) NOT NULL UNIQUE,
        PRIMARY KEY (cat_id, cat_name)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
    //Declaration of BOOK_TABLE
    //two differents book must have different names but they can have the same author, price or img
    $db_init_book ="CREATE TABLE IF NOT EXISTS `book_table` (
        `book_id` int(11) NOT NULL UNIQUE AUTO_INCREMENT,
        `book_name` varchar(255) NOT NULL UNIQUE,
        `book_img` varchar(255) NOT NULL,
        `book_price` DECIMAL (12, 2) NOT NULL,
        `author_name` varchar(255) NOT NULL,
        PRIMARY KEY (book_id, book_name),
        UNIQUE (book_id, book_name)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
    
    //Declaration of LINK_TABLE
    //This table is used to get the link between the books and the categories
    //one book can be from severals category and one category can describe severals books
    //FOREIGN KEY s used so that if we modify either the books table or the category table
    //we won't have to modify link too because the link_table is made of references towards
    //the other tables
    $db_init_link ="CREATE TABLE IF NOT EXISTS `link_table` (
        `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `cat_id` int(11) NOT NULL,
        `book_id` int(11) NOT NULL,
        FOREIGN KEY (cat_id) REFERENCES category_table(cat_id),
        FOREIGN KEY (book_id) REFERENCES book_table(book_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
        if (!mysqli_query($db, $db_init_user) || !mysqli_query($db, $db_init_category)
        || !mysqli_query($db, $db_init_book) || !mysqli_query($db, $db_init_link))
            array_push($errors, "Error creating tables");
    mysqli_close($mysqli);
}

function ft_fill_table()
{
    $db = mysqli_connect('localhost', 'root', 'rootroot', 'rush00');
    
    $book_value = array('Le Petit Prince', 'Dix petits nègres', 'Da Vinci Code',
    'Vingt mille lieues sous les mers', 'Les aventures de Sherlock Holmes',
    'Un conte de deux villes', 'Le Seigneur des Anneaux, Intégrale',
    'Alice au pays des merveilles', 'L\'Alchimiste');
    $db_book[0] = "REPLACE INTO book_table (book_id, book_name, author_name, book_price, book_img)
        VALUES (1, 'Le Petit Prince', 'Antoine De Saint-Exupéry', '6.80', 'https://images-na.ssl-images-amazon.com/images/I/71mvJ16WceL.jpg')";
    $db_book[1] = "REPLACE INTO book_table (book_id, book_name, author_name, book_price, book_img)
        VALUES (2, 'Dix petits nègres', 'Agatha Christie', '5.50', 'https://cdn1.booknode.com/book_cover/1/full/dix-petits-negres-1267.jpg')";
    $db_book[2] = "REPLACE INTO book_table (book_id, book_name, author_name, book_price, book_img)
        VALUES (3, 'Da Vinci Code', 'Dan Brown', '8.90', 'https://cdn1.booknode.com/book_cover/0/full/da-vinci-code-406.jpg')";
    $db_book[3] = "REPLACE INTO book_table (book_id, book_name, author_name, book_price, book_img)
        VALUES (4, 'Vingt mille lieues sous les mers', 'Jules Verne', '2.95', 'https://cdn1.booknode.com/book_cover/656/full/vingt-mille-lieues-sous-les-mers-655508.jpg')";
    $db_book[4] = "REPLACE INTO book_table (book_id, book_name, author_name, book_price, book_img)
        VALUES (5, 'Les aventures de Sherlock Holmes', 'Arthur Conan Doyle', '4.20', 'https://cdn1.booknode.com/book_cover/1192/full/les-aventures-de-sherlock-holmes-1191871.jpg')";
    $db_book[5] = "REPLACE INTO book_table (book_id, book_name, author_name, book_price, book_img)
        VALUES (6, 'Un conte de deux villes', 'Charles Dickens', '10.80', 'https://cdn1.booknode.com/book_cover/953/full/un-conte-de-deux-villes-952656.jpg')";
    $db_book[6] = "REPLACE INTO book_table (book_id, book_name, author_name, book_price, book_img)
        VALUES (7, 'Le Seigneur des Anneaux, Intégrale', 'J.R.R. Tolkien', '54.17', 'https://cdn1.booknode.com/book_cover/2980/full/le-seigneur-des-anneaux-integrale-2980412.jpg')";
    $db_book[7] = "REPLACE INTO book_table (book_id, book_name, author_name, book_price, book_img)
        VALUES (8, 'Alice au pays des merveilles', 'Lewis Carroll', '1.55', 'https://cdn1.booknode.com/book_cover/197/full/alice-au-pays-des-merveilles-196755.jpg')";
    $db_book[8] = "REPLACE INTO book_table (book_id, book_name, author_name, book_price, book_img)
        VALUES (9, 'L\'Alchimiste', 'Paulo Coelho', '6.40', 'https://cdn1.booknode.com/book_cover/668/full/l-alchimiste-667551.jpg')";
    $category_value = array('Amitié', 'Philosophie', 'Fantastique',
    'Policier', 'Suspence', 'Crime', 'Mystere', 'Thriller', 'Histoire',
    'Aventure', 'Meurtre', 'Conte', 'Spiritualite');
    $pw_u1=hash(whirlpool, 'user1');
    $pw_u2=hash(whirlpool, 'user2');
    $pw_ad=hash(whirlpool, 'adminroot');
    $db_user[2] = "REPLACE INTO user_table (user_id, user_name, user_passwd) VALUES (2, 'user1', '$pw_u1')";
    $db_user[3] = "REPLACE INTO user_table (user_id, user_name, user_passwd) VALUES (3, 'user2', '$pw_u2')";
    $db_user[1] = "REPLACE INTO user_table (user_id, user_name, user_passwd) VALUES (1, 'admin', '$pw_ad')";

    foreach ($db_book as $elem)
    {
        if (!mysqli_query($db, $elem))
            array_push($errors, "Error: books not added to table");
    }
    foreach ($db_user as $elem)
    {
        if (!mysqli_query($db, $elem))
            array_push($errors, "Error: users not added to table");
    }
    $i = 1;
    foreach ($category_value as $elem)
    {
        $query = "REPLACE INTO category_table (cat_id, cat_name)
            VALUES ('$i', '$elem')";
        if (!mysqli_query($db, $query))
            array_push($errors, "Error: category not added to table");
        $i++;
    }
    mysqli_close($mysqli);
}

?>