<?php
session_start();
include_once './Post.php';

include_once './Database.php';

$db = new Database();

//if(isset($_POST['user'])){
//if ($_POST['user'] !== ""){
//$_SESSION['user'] = $_POST['user'];


//$obj = [];
if (empty($_POST['text'])) {
http_response_code(400);
header('Content-TYpe: text/plain');
echo 'expect a message parameter';
exit(1);
}
echo($_POST['text']);
/* if(isset($_GET['text'])){
  echo($_GET['text']);
  } */
$date = new DateTime();
$date->format('Y-m-d H:i:s');
$post = new Post($_POST['text'], $date);
$db->postCreate($post);
echo $post;
//$posts = new Post($_POST['text'], $date, 'Bezu');
//$serpost = json_encode($post);
//array_push($obj, $posts);


?>