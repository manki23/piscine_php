<?PHP
session_start();
include 'auth.php';
if (auth($_POST["login"], $_POST["passwd"]))
{
    $_SESSION['loggued_on_user'] = $_POST["login"];
    ?>
    <iframe width="100%" height="550px" src="chat.php"></iframe>
    <iframe width="100%" height="50px" src="speak.php"></iframe><?PHP
    echo "\n";
}
else
{
    $_SESSION['loggued_on_user'] = "";
    echo "ERROR\n";
}
?>