#!/usr/bin/php
<?PHP
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
sort($ret);
foreach($ret as $print)
{
	echo $print."\n";
}
?>
