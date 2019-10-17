#!/usr/bin/php
<?PHP

if ($argc > 1 && file_exists($argv[1]))
{
	if (($fd = fopen($argv[1], "r")) === FALSE)
		return ;
	while (($line = fgets($fd)) !== FALSE)
		$read .= $line;
	$tmp = preg_split("/<\s*a/", $read);
	$i = 0;
	foreach($tmp as $elem)
	{
		if ($i)
		{
			$inside_a = preg_split("/<\s*\/a\s*>/", $elem);
			$title = preg_split("/title\s*=\s*\"/", $inside_a[0]);
			$u = 0;
			foreach($title as $ttt)
			{
				if ($u)
				{
					$in = preg_split("/\"/", $ttt);
					$read = str_replace($in[0], strtoupper($in[0]), $read);
					$inside_a[0] = str_replace($in[0], strtoupper($in[0]), $inside_a[0]);
				}
				$u++;
			}
			$link_txt = preg_split("/<\s*\/?span\s*|<\s*\/?div\s*|<\s*img\s*|<\s*\/?p\s*|<\s*\/?b\s*|<\s*\/?strong\s*|<\s*\/?em\s*|<\s*\/?i\s*/", $inside_a[0]);
			foreach($link_txt as $ttt)
			{
				$in = preg_split("/>\s*/", $ttt);
				$read = str_replace(trim($in[1]), trim(strtoupper($in[1])), $read);
			}
		}
		$i++;
	}
	fclose ($fd);
	echo "$read";
}

?>
