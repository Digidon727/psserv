<?php
require_once __DIR__ . './../vender2/db.php';


if(isset($_POST["profile_submit"])){ 

$date_dmy = $_POST["date_dmy"];
$status = $_POST["status_l"];
$type_device = $_POST["type_device"];
$model = $_POST["model"];
$name_user = $_POST["name_user"];
$phone = $_POST["phone"];
$name_master = $_POST["name_master"];
$is_public= (int)isset($_POST["is_public"]);



$sql = "INSERT INTO `user_register` (`date`, `status`, `device_type`, `model`, `name`, `phone`, `master`, `is_public`) 
VALUES (:date_dmy, :status_l, :type_device, :model, :name_user, :phone, :name_master, :is_public)";

$params = [
    "date_dmy" => $date_dmy,
    "status_l" => $status,
    "type_device" => $type_device,
    "model" => $model,
    "name_user" => $name_user,
    "phone" => $phone,
    "name_master" => $name_master,
    "is_public" => $is_public
    
];
$prepare = $dbh->prepare($sql);
$prepare->execute($params);


//Ошибка тут 
// $lastId = $dbh->lastInsertId();
// echo $lastId;
// header("Location: /list_info.php?=$lastId ");

header("Location: /list.php");
}
?>