<?php

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $ok = true;
    $messages = array();

    if ( !isset($username) || empty($username) ) {
        $ok = false;
        $messages[] = 'Username nie może być pusty!';
    }

    if ( !isset($password) || empty($password) ) {
        $ok = false;
        $messages[] = 'Password nie może być pusty!';



    }

    if ($ok) {
        if ($username === 'login' && $password === 'password') {
            $ok = true;
            $messages[] = 'Udane logowanie!';
        } else {
            $ok = false;
            $messages[] = 'Nieprawidlowe username/password !';
             $messages[] = 'X_X';
        }
    }


    echo json_encode(
        array(
            'ok' => $ok,
            'messages' => $messages
        )
    );

?>