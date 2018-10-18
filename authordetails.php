<?php

require_once 'authors.php';

if(isset($_POST['show'])){

    $p = new Author();
    $db = Database::getDb();
    $count = $s->getAllStudents($db);
}
?>

<h1>My Author Details</h1>
<form action="authordetails.php"  method="post">

    <input type="submit" name="show" value="Show Details">
</form>
