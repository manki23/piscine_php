<?PHP
function ft_split($str)
{
	$str = preg_split("/[\s]+/", trim($str));
	sort($str, SORT_STRING);
	return ($str);
}
?>
