#!/usr/bin/php
<?PHP

$i = 0;

foreach($argv as $elem)
{
	if ($i)
		echo $elem."\n";
	$i++;
}
?>
