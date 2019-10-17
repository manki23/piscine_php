#!/usr/bin/php
<?php

function get_name($img)
{
	$path_imgs = pathinfo($img);
	$img = $path_imgs['filename'];
	if (isset($path_imgs['extension']))
		$img = $img.".".$path_imgs['extension'];
	return ($img);
}

if ($argc > 1)
{
	if ($html_page = @file_get_contents($argv[1]))
	{
		$url_parsed = parse_url($argv[1]);
		if (!file_exists($url_parsed['host']))
			mkdir($url_parsed[host]); 
		preg_match_all("/(<img src=\")(.*?)(\")/", $html_page, $res);
		foreach ($res[2] as $elem)
		{
			if ($elem)
			{
				$img = parse_url($elem);
				if (count($img) == 3)
					$src = $elem;
				else
					$src = $url_parsed['scheme']."://".$url_parsed['host'].$elem;
				$name = get_name($elem);
				if (preg_match("/.jpg$|.jpeg$|.diff$|.gif$|.tiff$|.png$/i", $src))
					copy($src, $url_parsed['host']."/$name");
			}
		}
	}
}
?>
