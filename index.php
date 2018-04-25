<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/plain; charset=UTF-8");

$endpoints=array(
    "GET | api/hentai/read.php",
    "GET | api/anime/read.php",
);

$str = implode("\r\n",$endpoints);

echo $str;