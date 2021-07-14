<?php
 

//HEADERS
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../../config/Database.php');
include_once('../../models/Category.php');  

//Instantiate DB and connect
$database = new Database();
$db = $database->connect();

$category = new Category($db);

//Get id
$category->id = isset($_GET['id']) ? $_GET['id'] : die();

//Get single category 
$category->read_single();

//Create array
$category_arr = array(
    'id' => $category->id,
    'name' => $category->name,
);

print_r(json_encode($category_arr));

?>