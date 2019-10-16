#!/usr/bin/php
<?PHP

function ft_print_tab($tab)
{
	foreach($tab as $elem)
	{
		echo $elem."\n";
	}
}

function ft_custom_sort($tab)
{
	$alpha = array();
	$number = array();
	$other = array();
	foreach($tab as $elem)
	{
		if (ctype_alpha($elem))
			array_push($alpha, $elem);
		else if (is_numeric($number))
			array_push($number, $elem);
		else
			array_push($other, $elem);
	}
	natcasesort($alpha);
	sort($number, SORT_STRING);
	sort($other, SORT_STRING);
	return (array_merge($alpha, $number, $other));
}

$i = 0;
$ret = array();
foreach($argv as $elem)
{
	if ($i)
	{
		$tab = preg_split("/[\s]+/", trim($elem));
		foreach($tab as $add)
			array_push($ret, $add);
	}
	$i++;
}
ft_print_tab(ft_custom_sort($ret));
?>
