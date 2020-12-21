<?php

require('model/database.php');
require('model/account.php');
require('model/accounts_db.php');
require('model/questions_db.php');

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}

switch ($action) {
    case 'show_login': {
        if($_SESSION['userId']){
            header('Location: .?action=display_questions');
        } else{
            include('views/login.php');
        }
        break;
    }

    case 'validate_login': {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if ($email == NULL || $password == NULL) {
            $error = "Email and Password not included";
            include('errors/error.php');
        } else {
            $user = AccountsDB::validate_login($email, $password);
            $userId=$user->getId();
            echo "User ID IS: $userId";
            if ($userId == false) {
                header("Location: .?action=display_registration");
            } else {
                $_SESSION['userId'] = $userId;
                header("Location: .?action=display_questions");
            }
        }

        break;
    }

    case 'validate_registration': {
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $birthday = filter_input(INPUT_POST, 'birthday');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $userId = filter_input(INPUT_GET, 'userId');

        if ($firstName == NULL || $lastName == NULL ||$birthday == NULL ||$email == NULL ||$password == NULL) {
            $error = 'enter required fields';
            include('errors/error.php');
        } else {
            AccountsDB::validate_registration($firstName, $lastName, $birthday, $email, $password);
            header("Location: .?action=display_questions&userId=$userId");
            }
        break;
        }

    case 'display_registration':{
        include("views/registration.php");
        break;
    }

    case 'display_questions':{
        $userId = $_SESSION['userId'];
        $listType = filter_input(INPUT_GET, 'listType');
        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=show_login');
        } else {
            $questions = ($listType === 'all') ?
                questions_db::get_all_questions() : questions_db::get_questions_by_ownerId($userId);
            include('views/displayQuestions.php');
        }
        break;
    }

    case 'display_question_form':{
        $userId = filter_input(INPUT_GET, 'userId');
        if ($userId == NULL || $userId < 0) {
            header("Location: .?action=show_login");
        }
        else {
            include('views/questions.php');
            }
        break;
        }



    case 'submit_question';{
        $userId = filter_input(INPUT_POST, 'userId');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');
        if ($userId == NULL || $title == NULL || $body == NULL || $skills == NULL) {
            $error = 'All fields required';
            include('errors/error.php');
        }
        else{
            questions_db::create_question($title,$body,$skills,$userId);
            header("Location: .?action=display_questions&userId=$userId");
            }
        break;
        }

    case 'delete_question': {
        $questionId = filter_input(INPUT_POST,'questionId');
        $userId = filter_input(INPUT_POST,'userId');
        if($questionId == NULL || $userId == NULL){
            $error = 'All fields required';
            include('errors/error.php');
        } else{
            questions_db::delete_question($questionId);
            header("Location: .?action=display_questions&userId=$userId");
        }
    }



    case 'logout':{
        session_destroy();
        $_SESSION = array();

        $name = session_name();
        $expire = strtotime('-1 year');

        $params = session_get_cookie_params();

        setcookie($name, '', $expire, $params['domain'],$params['secure'],$params['httponly'] );

        header('Location: .');
        break;
    }

    default: {
        $error = 'Unknown Action';
        include('errors/error.php');
    }
}
