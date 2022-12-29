<?php
require_once __DIR__ . './../vender2/db.php';

// $sql = "INSERT INTO `user_register` (`date`, `status`, `device_type`, `model`, `name`, `phone`, `master`, `is_public`) 
// VALUES (:date_dmy, :status_l, :type_device, :model, :name_user, :phone, :name_master, :is_public)";

// $params = [
//     "date_dmy" => $date_dmy,
//     "status_l" => $status,
//     "type_device" => $type_device,
//     "model" => $model,
//     "name_user" => $name_user,
//     "phone" => $phone,
//     "name_master" => $name_master,
//     "is_public" => $is_public
    
// ];
// $prepare = $dbh->prepare($sql);
// $prepare->execute($params);

$stmt = $dbh->prepare("SELECT * FROM `user_register` WHERE `id` LIKE ? OR `name` LIKE ? OR `phone` LIKE ?");
$stmt->execute(["%".$_POST["search"]."%", "%".$_POST["search"]."%", "%".$_POST["search"]."%"]);
$results = $stmt->fetchAll();


?>