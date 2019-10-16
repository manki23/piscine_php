#!/usr/bin/php
<?PHP
if ($argc == 2)
{
	$tab = preg_split("/[\s]+/", trim($argv[1]));
	echo implode(" ", $tab)."\n";
}
?>
