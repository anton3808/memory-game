<?php 

	require 'libs/rb.php';
	R::setup( 'mysql:host=localhost;dbname=memory_game_base', 'root', '' );

	session_start();