<?php

class Author
{

    public function getAllAuthor($db){
        $sql = "SELECT * FROM authors";
        $pdostm = $db->prepare($sql);
        $pdostm->setFetchMode(PDO::FETCH_ASSOC);
        $pdostm->execute();

        $results = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    public function addAuthor($db, $fname, $lname, $code)
    {

        $sql = "INSERT INTO authors (fname, lname, code)
            VALUES (:fname, :lname, :code)";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':fname', $fname, PDO::PARAM_STR);
        $pdostm->bindValue(':lname', $lname, PDO::PARAM_STR);
        $pdostm->bindValue(':code', $code, PDO::PARAM_STR);
        $count  = $pdostm->execute();
        return $count;
        header("Location: listauthors.php");
    }

    public function deleteAuthor($db, $code){

        $sql = "DELETE FROM authors WHERE code = :code";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':code', $code, PDO::PARAM_INT);
        $count = $pdostm->execute();
        return $count;

    }

    public function authorUpdate($db, $fname, $lname, $code){
        $sql = "UPDATE authors 
                SET fname = :fname,
                lname = :lname
                WHERE code = :code";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':fname', $fname, PDO::PARAM_STR);
        $pdostm->bindValue(':lname', $lname, PDO::PARAM_STR);
        $pdostm->bindValue(':code', $code, PDO::PARAM_STR);

        $count  = $pdostm->execute();
        return $count;
    }

    public function getAuthorByCode($db, $code){
        $sql = "SELECT * FROM authors WHERE code = :code";
        $pdostm = $db->prepare($sql);
        $pdostm->bindValue(':code', $code, PDO::PARAM_STR);
        $count = $pdostm->execute();
        return $count;
    }




}
