<?php 
	
	require "db.php";

	$id_image = $_REQUEST["id"];

	$json_tran = json_decode( file_get_contents("translate.json") );

	$json_theme = json_decode( file_get_contents("themes.json") );

	if( isset($_SESSION['name_of_theme']) ){
		$key = array_search($_SESSION['name_of_theme'], $json_theme);
		$themes = $_SESSION['name_of_theme'];
		if( $json_tran[$key]->{'0'} == $_SESSION['name_of_theme'] ){
			echo $json_tran[$key]->EN[$id_image]." - ".$json_tran[$key]->UA[$id_image];
		}
	} else {
		$key = array_search($_SESSION['selected_theme'], $json_theme);
		$themes = $_SESSION['selected_theme'];
		if( $json_tran[$key]->{'0'} == $_SESSION['selected_theme'] ){
			echo $json_tran[$key]->EN[$id_image]." - ".$json_tran[$key]->UA[$id_image];
		}
	}

  

?>