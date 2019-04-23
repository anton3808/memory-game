<?php
    
    require "db.php";

    $data = $_POST;

    $errors = array();
    $user = R::findOne('users', 'login = ?', array($data['username']));
    if( $user ){
        //огин существует
        if ( password_verify($data['password'], $user->password) ){
            $_SESSION['logged_user'] = $user;
             $_SESSION['selected_theme'] = "Тварини";
            echo $user->id;
        } else {
            $errors[] = "Неверно введен пароль!";
        }
    } else {
        $errors[] = "Пользователь с таким логином не найден!";
    }

    if( ! empty($errors) ){
      echo array_shift($errors);
    }

    // function link_success () {
    //     header("Location: game.html?accid=$id");
    //     exit;
    // }
?>