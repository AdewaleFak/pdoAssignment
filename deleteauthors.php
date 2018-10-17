<?php


require_once 'database.php';
$code = $_POST['code'];
$db = Database::getDb();
$query = "DELETE FROM authors WHERE code = :code";
$pdostm = $db->prepare($query);
$pdostm->bindValue(':code', $code, PDO::PARAM_INT);
$count = $pdostm->execute();
if($count){
    header("Location: listauthors.php");
}else {
    echo "There was an error deleting";
}