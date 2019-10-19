<?PHP
function auth($login, $passwd)
{
    $dir = "../private";
    $file = $dir."/passwd";

    $hashed_pw = hash(whirlpool, $passwd);
    $unserialized = unserialize(file_get_contents($file));
    $i = 0;
    foreach ($unserialized as $elem)
    {
        if ($elem["login"] == $login && $elem["passwd"] == $hashed_pw)
            return TRUE;
        $i++;
    }
    return FALSE;
}
?>