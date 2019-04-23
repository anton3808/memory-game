<?php 
	require "db.php";
	 unset($_SESSION['name_of_theme']);
	 $data = $_POST;
	 $select_theme = $data["themes"];
	 $select_difficult = $data["difficults"];
	 $_SESSION['selected_theme'] = $select_theme;
	 $_SESSION['select_difficult'] = $select_difficult;
	 echo $_SESSION['selected_theme'];
?>