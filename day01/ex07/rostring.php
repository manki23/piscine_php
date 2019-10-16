#!/usr/bin/php
<?PHP
function ft_split($str)
{
	$ret = explode(" ", trim($str));
	$ret = array_diff($ret, array(''));
	$ret = array_values($ret);
	return ($ret);
}
if ($argc > 1)
{
	$input = ft_split($argv[1]);
	$i = 0;
	$result = array();
	array_push($input, $input[0]);
	foreach($input as $elem)
	{
		if ($i)
			array_push($result, $elem);
		$i++;
	}
	echo implode(" ", $result)."\n";
}
?>
