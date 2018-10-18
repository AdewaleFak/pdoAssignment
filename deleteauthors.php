<?php
require_once 'authors.php';
require_once 'database.php';


$code = $_POST['code'];
$db = Database::getDb();
$a = new Author();

$count = $a->deleteAuthor($db, $code);

if($count){
    header("Location: listauthors.php");
}else {
    echo "There was an error deleting";
}