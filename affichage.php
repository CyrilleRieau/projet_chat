<?php

session_start();
include_once './Post.php';

include_once './Database.php';

$db = new Database();

echo(json_encode($db->readPost())); 
?>

