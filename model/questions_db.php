<?php

class questions_db{

    public static function get_questions_by_ownerId ($ownerId) {
        global $db;
        $query = 'SELECT * FROM questions WHERE ownerId = :ownerId';

        $statement = $db->prepare($query);
        $statement->bindValue(':ownerId', $ownerId);
        $statement->execute();

        $questions = $statement->fetchAll();
        $statement->closeCursor();

        return $questions;
    }
    public static function get_all_questions(){
        global $db;

        $query = 'SELECT * FROM questions';
        $statement = $db->prepare($query);
        $statement->execute();

        $questions = $statement->fetchAll();
        $statement->closeCursor();

        return $questions;
    }

    public static function delete_question($questionId){
        global $db;

        $query = 'DELETE FROM questions WHERE id = :questionId';
        $statement = $db->prepare($query);
        $statement->bindValue(':questionId', $questionId);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function create_question ($title, $body, $skills, $ownerid){
        global $db;

        $query = 'INSERT INTO questions
                (title, body, skills, ownerid)
                VALUES
                (:title, :body, :skills, :ownerid)';
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':body', $body);
        $statement->bindValue(':skills', $skills);
        $statement->bindValue(':ownerid', $ownerid);

        $statement->execute();
        $statement->closeCursor();
    }

}


/*
function get_questions_by_ownerId ($ownerId) {
    global $db;
    $query = 'SELECT * FROM questions WHERE ownerId = :ownerId';

    $statement = $db->prepare($query);
    $statement->bindValue(':ownerId', $ownerId);
    $statement->execute();

    $questions = $statement->fetchAll();
    $statement->closeCursor();

    return $questions;
}

function get_all_questions(){
    global $db;

    $query = 'SELECT * FROM questions';
    $statement = $db->prepare($query);
    $statement->execute();

    $questions = $statement->fetchAll();
    $statement->closeCursor();

    return $questions;
}

function delete_question($questionId){
    global $db;

    $query = 'DELETE FROM questions WHERE id = :questionId';
    $statement = $db->prepare($query);
    $statement->bindValue(':questionId', $questionId);
    $statement->execute();
    $statement->closeCursor();
}

function create_question ($title, $body, $skills, $ownerid){
    global $db;

    $query = 'INSERT INTO questions
                (title, body, skills, ownerid)
                VALUES
                (:title, :body, :skills, :ownerid)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':body', $body);
    $statement->bindValue(':skills', $skills);
    $statement->bindValue(':ownerid', $ownerid);

    $statement->execute();
    $statement->closeCursor();
}





