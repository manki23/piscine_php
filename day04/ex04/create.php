<?PHP
header('Location: index.html');
$dir = "../private";
$file = $dir."/passwd";

if ($_POST['login'] != NULL && $_POST['passwd'] != NULL && $_POST['submit'] == "OK")
{
    $tab["login"] = $_POST["login"];
    $tab["passwd"] = hash(whirlpool, $_POST["passwd"]);
    $tab2[] = $tab;

    if (!file_exists($dir))
        mkdir($dir);
    if (!file_exists($file))
        file_put_contents($file, serialize($tab2)."\n");
    else
    {
        
        $unserialized = unserialize(file_get_contents($file));
        $i = 0;
        foreach ($unserialized as $elem)
        {
            foreach($elem as $login=>$value)
            {
                if ($value == $tab["login"])
                {
                    echo "ERROR\n";
                    return ;
                }
            }
            $i++;
        }
        $unserialized[$i] = $tab;
        file_put_contents($file, serialize($unserialized)."\n");
    }
    echo "OK\n";
}
else
    echo "ERROR\n";
?>