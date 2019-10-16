#!/usr/bin/php
<?PHP

function ft_calcul($tab1, $tab2, $tab3)
{
	if ($tab2 == "+")
		$res = $tab1 + $tab3;
	else if ($tab2 == "-")
		$res = $tab1 - $tab3;
	else if ($tab2 == "*")
		$res = $tab1 * $tab3;
	else if ($tab2 == "/")
		$res = $tab1 / $tab3;
	else if ($tab2 == "%")
		$res = $tab1 % $tab3;
	return ($res);
}

function ft_split($str)
{
	$nb1 = array();
	$op = array();
	$nb2 = array();
	$tab = explode(" ", $str);
	if (count($tab) == 1)
	{
		$split = str_split($tab[0]);
		$i = 0;
		while ($i < count($split))
		{
			if (is_numeric($split[$i]) && count($nb2) == 0 && count($op) == 0)
				array_push($nb1, $split[$i]);
			else if (is_numeric($split[$i]) && count($op) != 0)
				array_push($nb2, $split[$i]);
			else
				array_push($op, $split[$i]);

			$i++;
		}
		$fusion = array();
		array_push($fusion, implode($nb1));
		array_push($fusion, implode($op));
		array_push($fusion, implode($nb2));
		$tab = $fusion;
	}
	return $tab;
}

if ($argc == 2)
{
	$tab = ft_split(trim($argv[1]));
	if (count($tab) != 3 || !is_numeric($tab[0]) || !is_numeric($tab[2])
		|| !($tab[1] == "+" || $tab[1] == "-" || $tab[1] == "*" || $tab[1] == "/"|| $tab[1] == "%"))
		echo "Syntax Error\n";
	else
		echo ft_calcul($tab[0], $tab[1], $tab[2])."\n";

}

if ($argc == 2)
{
}
else
	echo "Incorrect Parameters\n";
?>
