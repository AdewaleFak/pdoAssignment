<?php
require_once 'database.php';
require_once 'authors.php';


$db = Database::getDb();
$a = new Author();
$count = $a->getAllAuthor($db);

if($count){
    header("Location: listauthors.php");
}else {
    echo "Problem Updating";
}



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