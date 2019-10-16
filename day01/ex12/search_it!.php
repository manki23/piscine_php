#!/usr/bin/php
<?PHP
$i = 0;
$key = array();
$value = array();
$error = 0;
foreach($argv as $elem)
{
	if ($i == 1)
		$search = $elem;
	else if ($i > 0)
	{
		$tab = explode(":", trim($elem));
		if (count($tab) != 2)
		{
			echo "Syntax Error\n";
			$error = 1;
			break;
		}
		array_push($key, $tab[0]);
		array_push($value, $tab[1]);
		$key = array_reverse($key);
		$value = array_reverse($value);
	}
	$i++;
}
if (!$error)
{
	$i = 0;
	foreach($key as $elem)
	{
		if ($elem == $search)
		{
			echo $value[$i]."\n";
			break;
		}
		$i++;
	}
}

?>
