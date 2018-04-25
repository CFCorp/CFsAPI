<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Cache-Control: no-cache");

// include database and object files
include_once '../config/database.php';
include_once '../objects/hentai.php';
 
// instantiate database and hentai object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$hentai = new Hentai($db);
 
// query hentais
$stmt = $hentai->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // hentai array
    $hentais_arr=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $hentai_item=array(
            "url" => $url
        );
    }
 
    echo json_encode($hentai_item);
}
 
else{
    echo json_encode(
        array("message" => "No hentais found.")
    );
}
?>