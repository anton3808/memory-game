<?php  
  require "db.php";
?>

<?php  if( isset($_SESSION['logged_user']) ) : ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <title>Memory Game</title>

  <link rel="icon" href="img/brain_3.jpg">
  <link rel="stylesheet" href="css/menu.css">

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

  <!--   Font Awesome   -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>

  <div class="wrapper">
    <div class="loader">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>


  <main>
    <h1>Menu</h1>
    <div class="hello">Прівет, <?php echo $_SESSION['logged_user']->login; ?> <a href="test.php">Account</a></div>


    <form id="choose_theme_form">
      <div class="choose_difficult">
        <label class="title_of_theme">Вибрати складність гри:</label>
        <select class="select-difficult" name="difficults">
          <option value="hard">Важко</option>  
          <option value="easy">Легко</option>  
        </select>
        <br>
      </div>
      <label class="title_of_theme" onclick="succeed()">Вибрати тему гри:</label>
      <select class="select-themes" name="themes">
        <!-- <option value="Animals">Animals</option>  --> 
      </select>
      <br>
      <input class="button_select" type="submit" value="Play">
    </form>

    <form  method="post" enctype="multipart/form-data" id="create_themes" class="theme-form">
<!--       <div class="title_of_theme">Створіть свою тему:</div> -->
      <label for="name_of_theme" class="title_of_theme">Створіть свою тему:</label>
      <input class="name_of_theme" type="text" name="name_of_theme" placeholder="Назва теми" required>
      <br>

      <label for="files" class="input-labels"> 
        <i class="fas fa-upload"></i>
        <span id="label_spans">Виберіть 6 файлів</span>
      </label>
      <input id="files" type="file" name="images[]" accept=".png, .jpg, .jpeg" multiple="true" required>

      <input class="button_create"  type="submit" value="Створити">
    </form>


    <form  method="post" enctype="multipart/form-data" id="create_theme" class="theme-form">
<!--       <div class="title_of_theme">Створіть свою тему:</div> -->


      <label for="file" class="input-label"> 
        <i class="fas fa-upload"></i>
        <span id="label_span">Виберіть файл</span>
      </label>
      <input id="file" type="file" name="image[]" accept=".png, .jpg, .jpeg"  required>
      <input class="translate_input" type="text" name="text_1" placeholder="Переклад фото">


      <label for="file1" class="input-label"> 
        <i class="fas fa-upload"></i>
        <span id="label_span_1">Виберіть файл</span>
      </label>
      <input id="file1" type="file" name="image[]" accept=".png, .jpg, .jpeg"  required>
      <input class="translate_input" type="text" name="text_2" placeholder="Переклад фото">


      <label for="file2" class="input-label"> 
        <i class="fas fa-upload"></i>
        <span id="label_span_2">Виберіть файл</span>
      </label>
      <input id="file2" type="file" name="image[]" accept=".png, .jpg, .jpeg"  required>
      <input class="translate_input" type="text" name="text_3" placeholder="Переклад фото">


      <label for="file3" class="input-label"> 
        <i class="fas fa-upload"></i>
        <span id="label_span_3">Виберіть файл</span>
      </label>
      <input id="file3" type="file" name="image[]" accept=".png, .jpg, .jpeg"  required>
      <input class="translate_input" type="text" name="text_4" placeholder="Переклад фото">


      <label for="file4" class="input-label"> 
        <i class="fas fa-upload"></i>
        <span id="label_span_4">Виберіть файл</span>
      </label>
      <input id="file4" type="file" name="image[]" accept=".png, .jpg, .jpeg"  required>
      <input class="translate_input" type="text" name="text_5" placeholder="Переклад фото">
     

     <label for="file5" class="input-label"> 
        <i class="fas fa-upload"></i>
        <span id="label_span_5">Виберіть файл</span>
      </label>
      <input id="file5" type="file" name="image[]" accept=".png, .jpg, .jpeg"  required>
      <input class="translate_input" type="text" name="text_6" placeholder="Переклад фото">

      <input class="button_create"  type="submit" value="Створити">
    </form>
    
    
    <input class="exit" onclick="exit();" type="submit" value="Exit">
  </main>


  <script src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script src="js/form.js"></script>
  <script src="js/menu.js"></script>
  <script src="js/main.js"></script>
   <script src="js/preloader.js"></script>
</body>
</html>

<?php else : ?>
  Не авторизован
<?php endif; ?>