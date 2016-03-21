<?php

$dir = "/tmp";
$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
	$files[] = $filename;
}

sort($files);

print_r($files);

rsort($files);

print_r($files);








