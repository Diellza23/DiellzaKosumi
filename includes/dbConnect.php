<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=login", "root" , "");    
}catch(PDOException $pdo){
    die("Unsuccessful connection");
}
?>