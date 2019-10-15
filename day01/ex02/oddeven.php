#!/usr/bin/php
<?PHP

function ft_what_is_number($nb)
{
	if (is_numeric($nb))
	{
		if ($nb % 2)
			echo "Le chiffre "."$nb"." est Impair\n";
		else
			echo "Le chiffre "."$nb"." est Pair\n";
	}
	else
		echo "'"."$nb"."' n'est pas un chiffre\n";
}
while (!feof(STDIN))
{
	echo "Entrez un nombre: ";
	$number = trim(fgets(STDIN));
	if (feof(STDIN))
		echo "\n";
	else
		ft_what_is_number($number);
}
?>
