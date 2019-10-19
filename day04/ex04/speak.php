<?PHP
session_start();

include 'auth.php';
$path = "../private";
$filechat = $path."/chat";
if ($_SESSION['loggued_on_user'] && $_SESSION['loggued_on_user'] != "")
{
    if (!file_exists($path))
        mkdir($path);
    if (!file_exists($filechat))
        file_put_contents($filechat, null);
    else
    {
        flock($filechat, LOCK_EX);
        $chat = unserialize(file_get_contents($filechat));
    }
    if ($_POST['msg'])
    {
        $tab['login'] = $_SESSION['loggued_on_user'];
        $tab['time'] = time();
        $tab['chat'] = $_POST['msg'];
        $chat[] = $tab;
        file_put_contents($filechat, serialize($chat)."\n");
        flock($filechat, LOCK_UN);
    }
    echo $_SESSION['loggued_on_user']." : ";
    ?>
    <head><script langage="javascript">top.frames['chat'].location = 'chat.php';</script></head>
    <form method=POST action="speak.php" style="margin-block-end: 0">
        <input name="msg" type="text" style="width=100%; height=100%;" autofocus/>
    </form><?PHP echo "\n";
}
else
    echo "ERROR\n";
?>