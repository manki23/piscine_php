#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	$str = preg_split("/[\s]+/", trim($argv[1]));
	$str = implode(" ", $str);
	echo $str."\n";
}
?>
