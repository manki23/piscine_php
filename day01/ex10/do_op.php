#!/usr/bin/php
<?PHP

if ($argc == 4)
{
	if (trim($argv[2]) == "+")
		$res = trim($argv[1]) + trim($argv[3]);
	else if (trim($argv[2]) == "-")
		$res = trim($argv[1]) - trim($argv[3]);
	else if (trim($argv[2]) == "*")
		$res = trim($argv[1]) * trim($argv[3]);
	else if (trim($argv[2]) == "/")
		$res = trim($argv[1]) / trim($argv[3]);
	else if (trim($argv[2]) == "%")
		$res = trim($argv[1]) % trim($argv[3]);
	echo $res."\n";
}
else
	echo "Incorrect Parameters\n";
?>
