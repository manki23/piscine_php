<?PHP

function ft_is_sort($tab)
{
	$cmp = $tab;
	sort($cmp, SORT_STRING);
	$i = 0;
	foreach($tab as $elem)
	{
		if ($elem != $cmp[$i])
			return (FALSE);
		$i += 1;
	}
	return TRUE;
}
?>
