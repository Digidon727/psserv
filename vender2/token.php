<?php
require_once __DIR__ . './../vender2/db.php';

function generateToken(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[rand(0, $max)];
    }
    return implode('', $pieces);
}

function updateUserToken(object $dbh, int $user, string $token): void{
    $sql = "UPDATE `users` SET `token`= :token";
    $params = ["token" => $token];
    $dbh->prepare($sql)->execute($params); 
}


function fetchUserByToken(object $dbh, string $token){
    $sql = "SELECT * FROM `users` WHERE `token` =:token";
    $params = ["token"=> $token];
    $fetchUser = $dbh->prepare($sql);
    $fetchUser->execute($params);
    return $fetchUser->fetch(PDO::FETCH_ASSOC);
    
}
?>