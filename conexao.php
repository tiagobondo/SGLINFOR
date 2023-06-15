<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=labinfor','root','');

} catch (PDOException $err) {
    echo "Erro ao se conectar!".$err->getMessage();
}


?>