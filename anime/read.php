<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Cache-Control: no-cache");

// include database and object files
include_once '../config/database.php';
include_once '../objects/anime.php';
 
// instantiate database and anime object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$anime = new Anime($db);
 
// query anime
$stmt = $anime->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // anime array
    $animes_arr=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $anime_item=array(
            "url" => $url
        );
    }
 
    echo json_encode($anime_item);
}
 
else{
    echo json_encode(
        array("message" => "No anime found.")
    );
}
?>