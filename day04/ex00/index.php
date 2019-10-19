<?PHP
session_start();
if ($_GET['login'] != NULL && $_GET['passwd'] != NULL && $_GET['submit'] == "OK")
{
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = $_GET['passwd'];
}
?>
<html><body>
<form method=get>
Identifiant: <input required="TRUE" name="login" value="<?php echo $_SESSION['login'];?>"/>
<br />
Mot de passe: <input required="TRUE" name="passwd" type="password" value="<?php echo $_SESSION['passwd'];?>"/>
<input type="submit" name="submit" value="OK" />
</form>
</body></html>
