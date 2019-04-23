<?php
	require "db.php";

	$errors = array();

	$moves = $_REQUEST["moves"];
	$time = $_REQUEST["time"];
	$matched = $_REQUEST["matched"];
	$id_game = 1;

	$users_id =  $_SESSION['logged_user']->id;
	$user_name =  $_SESSION['logged_user']->login;
	$table_name = $user_name;

	$results = R::dispense($table_name);
	// $results->username = $results_name;
	$results->moves = $moves;
	$results->time_of_game = $time;
	$results->matched_cards = $matched;
	R::store($results);
	echo "Moves: ".$moves.", time: ".$time.", matched: ".$matched;


	// if ( R::count('users', "login = ?", array($data['name'])) > 0 ) {
	// 	$errors[] = 'Пользователь с таким Логином существует !';
	// }

	// if ( R::count('users', "email = ?", array($data['email'])) > 0 ) {
	// 	$errors[] = 'Пользователь с таким Email существует !';
	// }


 //  if( empty($errors) ){
	//   $user = R::dispense('users');
	//   $user->login = $data['name'];
	//   $user->email = $data['email'];
	//   $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
	//   $user->reg_date = time();
	//   R::store($user);
	//   echo "Ви зарегеструвались! Ввійдіть в акаунт!";
	// } else {
	// 	echo array_shift($errors);
	// }


	// $servername = "localhost";
	// $username = "root";
	// $password = "";


	// try{
	// 	// $user = "anton";
	// 	// $moves = $_REQUEST["moves"];
	// 	// $time = $_REQUEST["time"];
	// 	// $matched = $_REQUEST["matched"];
	// 	// $id_game = 1;


	// 	$conn = new PDO("mysql:host=$servername; dbname=memory_game_base", $username, $password);

	// 	// INSERT INTO `result` (`user_results`, `id_result`, `moves`, `time`, `matched_cards`) VALUES ('admin', NULL, $moves, $time, $matched);
	// 	$query = "INSERT INTO results VALUES (:username . NOW() . :moves . :time_game . :matched_cards . :id_game";
	// 	$msg = $conn->prepare($query);
	// 	// $msg->execute(['username' => $user, 'moves' => $moves, 'time_game' => $time, 'matched_cards' => $matched, 'id_game' => $id_game]);
	// 	$msg->execute(['username' => 'anton', 'moves' => 54, 'time_game' => 123, 'matched_cards' => 6, 'id_game' => 1]);

	// 	// echo "Moves: ".$moves.", time: ".$time.", matched: ".$matched;
	// 	echo "Success";

	// }catch(PDOException $e){
	// 	echo "Error";
	// }
	

?>