<?php  
  require "db.php";
  unset($_SESSION['logged_user']);
  unset($_SESSION['name_of_theme']);
  unset($_SESSION['selected_theme']);
  header('Location: /');
?>