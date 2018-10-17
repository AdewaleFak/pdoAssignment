<?php

require_once 'database.php';
$db= Database::getDb();
if(isset($_POST['update'])) {
    $code = $_POST['code'];
    $query = "SELECT * FROM authors WHERE code= :code";
    $pdostm = $db->prepare($query);
    $pdostm->bindValue(':code', $code, PDO::PARAM_INT);
    $pdostm->execute();
    $su = $pdostm->fetch(PDO::FETCH_OBJ);
}
if(isset($_POST['upt'])){
    $code = $_POST['code'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];


    $sql = "UPDATE authors 
                SET fname = :fname,
                lname = :lname
                WHERE code = :code";
    $pdostm = $db->prepare($sql);

    $pdostm->bindValue(':code', $code, PDO::PARAM_INT);
    $pdostm->bindValue(':fname', $fname, PDO::PARAM_STR);
    $pdostm->bindValue(':lname', $lname, PDO::PARAM_STR);

    $count  = $pdostm->execute();
    if($count){
        header("Location: listauthors.php");
    }else {
        echo "Problem Updating";
    }
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


<form class="form-signin" action="updateauthors.php"  method="post">
    <h1 class="form-signin-heading">Update Authors</h1>
    <input type="hidden" value="<?= $su->code; ?>" name="code">
    <label>First Name:</label>
    <input type="text" class="form-control" name="fname"  value="<?= $su->fname; ?>"/><br>
    <label>Last Name:</label>
    <input type="text" class="form-control" name="lname" value="<?= $su->lname; ?>" /><br>
    <button name="upt" type="submit">Update Author</button><br><br>

    <a href="listauthors.php">Authors On File</a>
</form>

</div>

</body>
</html>