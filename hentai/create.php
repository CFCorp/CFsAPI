<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate hentai object
include_once '../objects/hentai.php';
 
$database = new Database();
$db = $database->getConnection();
 
$hentai = new Hentai($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set hentai property values
$hentai->url = $data->url;
 
// create the hentai
if($hentai->create()){
    echo '{';
        echo '"message": "Hentai link was posted"';
    echo '}';
}
 
// if unable to create the hentai, tell the user
else{
    echo '{';
        echo '"message": "Hentai link was unable to be posted"';
    echo '}';
}
?>