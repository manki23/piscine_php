#!/usr/bin/php
<?php

date_default_timezone_set("Europe/Paris");

$utmpx = "/var/run/utmpx";
$fd = fopen($utmpx, "r");
$tab = array();

while (($bin = fread($fd, 314)))
{
	$bin = unpack("a256user/a4id/a32line/ipid/itype/I2time", $bin);
	if (strcmp($bin['type'], "7") === 0)
		array_push($tab, $bin);
}
fclose($fd);
sort($tab);
foreach ($tab as $user)
	echo $user['user']."\t ".$user['line']."  ".date("M j H:i", $user['time1'])."\n";
?>
