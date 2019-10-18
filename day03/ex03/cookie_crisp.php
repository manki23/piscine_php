<?PHP
$name = "";
$action = "";
$val = "";
$i = 0;
foreach($_GET as $key => $value)
{
    $i++;
    if ($key == "name")
        $name = $value;
    else if ($key == "value")
        $val = $value;
    else if ($key == "action")
        $action = $value;
    else
        $i = -1;
}
if ($i == 3 && $action == "set")
    setcookie($name, $val);
else if ($action == "del")
    setcookie($name, $val, 0);
else if ($action == "get" && $_COOKIE[$name])
    echo $_COOKIE[$name]."\n";
?>