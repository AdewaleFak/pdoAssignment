<?php
require_once 'database.php';
require_once 'authors.php';
if(isset($_POST['submit'])){
    //get form values and assign to local varaibles
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $code = $_POST['code'];
    $db = Database::getDb();
    $sql = "INSERT INTO authors (fname, lname, code)
            VALUES (:fname, :lname, :code)";

    $a =  new Author();
    $count=$a->addAuthor($db, $fname, $lname, $code);

    header("Location: listauthors.php");
    echo "New Author ". $count. " Inserted " ;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database</title>

    <link href="author.css" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    <form class="form-signin" action="addauthors.php" method="post">
        <h2 class="form-signin-heading">Author's Profile</h2>
        <label>First Name:</label>
        <input type="text" class="form-control" name="fname" placeholder="Firstname" /></br>
        <label>Last Name:</label>
        <input type="text" class="form-control" name="lname" placeholder="Lastname" /></br>
        <label>Author ID:</label>
        <input type="text" class="form-control" name="code" placeholder="Code" /></br>

        <button name="submit" type="submit">Add Author</button><br><br>

        <a href="listauthors.php">Authors On File</a>
    </form>
</div>

</body>
</html>