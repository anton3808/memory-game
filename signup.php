<?php
	require "db.php";

	$errors = array();
	$data = $_POST;


	if ( R::count('users', "login = ?", array($data['name'])) > 0 ) {
		$errors[] = 'Пользователь с таким Логином существует !';
	}

	if ( R::count('users', "email = ?", array($data['email'])) > 0 ) {
		$errors[] = 'Пользователь с таким Email существует !';
	}


  if( empty($errors) ){
	  $user = R::dispense('users');
	  $user->login = $data['name'];
	  $user->email = $data['email'];
	  $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
	  $user->reg_date = time();
	  R::store($user);
	  echo "Ви зарегеструвались! Ввійдіть в акаунт!";
	} else {
		echo array_shift($errors);
	}

?>