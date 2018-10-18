<?php
require_once 'database.php';


$db = Database::getDb();
$sql = "SELECT * FROM authors";
$pdostm = $db->prepare($sql);
//specify fetch method
$pdostm->setFetchMode(PDO::FETCH_OBJ);
$pdostm->execute();
//fetch all result
$authors = $pdostm->fetchAll(PDO::FETCH_OBJ);


?>

<h1>List of Authors</h1>
<ol>

    <?php


    foreach ($authors as $a){
        echo "<li>" . $a->fname ." ". $a->lname . "</br>" .
            " <form action='deleteauthors.php' method='post'>
            <input type='hidden' name='code' value='$a->code' />
            <input type='submit' name='delete' value='Delete Author'>
            </form> 
            <form action='updateauthors.php' method='post'>
            <input type='hidden' name='code' value='$a->code' />
            <input type='submit' name='update' value='Update Author'>
            </form>
            </li>";
    }

    ?>
</ol>

<a href="addauthors.php">Add an Author</a>