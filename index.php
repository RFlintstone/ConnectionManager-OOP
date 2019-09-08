<?php
require 'Database.php';

$pdo = new Database('localhost','test1','root','');
$conn = $pdo->connect();

$pdo->query( 'INSERT INTO users (firstname, lastname, age) VALUES ("Lorem", "Ipsum2", 35)');

$pdo = new Database('localhost','test2','root','');
$conn = $pdo->connect();
$pdo->query( 'INSERT INTO users (firstname, lastname, age) VALUES ("Lorem", "Ipsum2", 35)');

$pdo->debug(true);
if ($pdo && $pdo->checkdebug() == true){
    echo 'Connected!';
}

