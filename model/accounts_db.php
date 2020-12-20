<?php

function validate_login($email, $password) {
    global $db;
    $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';

    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();

    $user = $statement->fetch();
    $isValidLogin = count($user) > 0;
    if (!$isValidLogin) {
        $statement->closeCursor();
        return false;
    } else {
        $userId = $user['id'];
        $statement->closeCursor();
        return $userId;
    }

}

function validate_registration($firstName, $lastName, $birthday, $email, $password){
    global $db;
    $query = 'INSERT INTO accounts
            (email, fname, lname, birthday, password)
          VALUES
            (:email, :fname, :lname, :birthday, :password)';

    $statement = $db->prepare($query);

    $statement->bindValue(':email', $email);
    $statement->bindValue(':fname', $firstName);
    $statement->bindValue(':lname', $lastName);
    $statement->bindValue(':birthday', $birthday);
    $statement->bindValue(':password', $password);

    $statement->execute();

    $statement->closeCursor();

}