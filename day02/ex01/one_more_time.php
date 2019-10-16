#!/usr/bin/php
<?PHP

date_default_timezone_set('Europe/Paris');

function ft_check_day($str)
{
	if (preg_match("/^[Ll]undi$/", $str)
		|| preg_match("/^[Mm]ardi$/", $str)
		|| preg_match("/^[Mm]ercredi$/", $str)
		|| preg_match("/^[Jj]eudi$/", $str)
		|| preg_match("/^[Vv]endredi$/", $str)
		|| preg_match("/^[Ss]amedi$/", $str)
		|| preg_match("/^[Dd]imanche$/", $str))
		return (TRUE);
	else
		return FALSE;
}

function ft_check_day_nb($str, $month)
{
	$month_31 = array(1, 3, 5, 7, 8, 10, 12);
	$month_30 = array(4, 6, 9, 11);
	if (((in_array($month, $month_31) && (int)$str > 0 && (int)$str <= 31)
		|| (in_array($month, $month_30) &&  (int)$str > 0 && (int)$str <= 30)
		|| ($month == 2 && (int)$str > 0 && (int)$str <= 29)) && strlen($str) <= 2)
		return (TRUE);
	else
		return FALSE;
}

function ft_check_month($str)
{
	if (preg_match("/^[Jj]anvier$/", $str))
		$month = 1;
	else if (preg_match("/^[Ff][ée]vrier$/", $str))
		$month = 2;
	else if (preg_match("/^[mM]ars$/", $str))
		$month = 3;
	else if (preg_match("/^[aA]vril$/", $str))
		$month = 4;
	else if (preg_match("/^[Mm]ai$/", $str))
		$month = 5;
	else if (preg_match("/^[Jj]uin$/", $str))
		$month = 6;
	else if (preg_match("/^[Jj]uillet$/", $str))
		$month = 7;
	else if (preg_match("/^[aA]o[uû]t$/", $str))
		$month = 8;
	else if (preg_match("/^[Ss]eptembre$/", $str))
		$month = 9;
	else if (preg_match("/^[oO]ctobre$/", $str))
		$month = 10;
	else if (preg_match("/^[Nn]ovembre$/", $str))
		$month = 11;
	else if (preg_match("/^[dD][ée]cembre$/", $str))
		$month = 12;
	else
		$month = FALSE;
	return $month;
}

function ft_check_year($str)
{
	if (preg_match("/^[1-9][0-9]{3}$/", $str))
		return TRUE;
	else
		return FALSE;
}

function ft_check_time($str)
{
	$time = explode(":", $str);
	if (count($time) == 3 && is_numeric($time[0]) && is_numeric($time[1])
		&& is_numeric($time[2]) &&preg_match("/[0-2][0-9]/",$time[0])
		&& preg_match("/[0-5][0-9]/",$time[1]) && preg_match("/[0-5][0-9]/",$time[2])
		&& (int)$time[0] >= 0 && (int)$time[0] <= 23 && (int)$time[1] >= 0 && (int)$time[1] <= 59
		&& (int)$time[2] >= 0 && (int)$time[2] <= 59 && strlen($time[0]) <= 2
		&& strlen($time[1]) <= 2 && strlen($time[2]) <= 2)
		return ($time);
	else
		return FALSE;
}

function ft_check_input($str)
{
	$tab = explode(" ", $str);
	if (count($tab) == 5 && is_numeric($tab[1]) && is_numeric($tab[3]) &&
		(ft_check_day($tab[0]) && ($month = ft_check_month($tab[2])) !== FALSE
		&& ft_check_day_nb($tab[1], $month) && ft_check_year($tab[3]) && ($time = ft_check_time($tab[4]))))
	{
		echo mktime($time[0], $time[1], $time[2], $month, $tab[1], $tab[3])."\n";
		return (TRUE);
	}
	else
		return (FALSE);
}

if ($argc == 2)
{
	if (!ft_check_input(trim($argv[1])) !== FALSE)
		echo "Wrong Format\n";
}
?>
