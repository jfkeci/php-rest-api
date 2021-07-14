<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: appliaction/json');

include_once('../../config/Database.php');
include_once('../../models/Category.php');

$database = new Database();
$db = $database->connect();

$category = new Category($db);

$result = $category->read();

$num = $result->rowCount();

if($num > 0){
    $cat_arr = array();
    $cats_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $cat_item = array(
            'id' => $id,
            'name' => $name
        );

        array_push($cats_arr['data'], $cat_item);
    }

    echo json_encode($cats_arr);
}else{
    echo json_encode(array('message'=>'No categories found'));
}

?>