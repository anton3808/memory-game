<?php  
  require "db.php";
?>

<?php  if( isset($_SESSION['logged_user']) ) : ?><!--Open login-->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <title>Memory Game</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.6.3/js/all.js" integrity="sha384-EIHISlAOj4zgYieurP0SdoiBYfGJKkgWedPHH4jCzpCXLmzVsw1ouK59MuUtP4a1" crossorigin="anonymous"></script>
  <link rel="icon" href="img/brain_3.jpg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">

  <link rel="stylesheet" href="css/game.css">
  <link rel="stylesheet" href="css/media.css">
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

  <?php  
  if( $_SESSION['select_difficult'] == "easy" ) :  // Open difficult
    if( isset($_SESSION['name_of_theme']) ) : ?>?> <!-- Open name -->
    


      <main>
        <section class="header-game">
          <h1>Memory game</h1>
          <div class="items star-mark">
            <span class="star-mark_first star"><i class="fas fa-star"></i></span>
            <span class="star-mark_second star"><i class="fas fa-star"></i></span>
            <span class="star-mark_third star"><i class="fas fa-star"></i></span>
            <span class="star-mark_text">Great!</span>
          </div>
          <div class="items moves">Moves: <span class="moves-count">0</span> </div>
          <div class="items time">Time: <span class="time-count">00:00:00</span> </div>
          <div class="items reload">
            <span class="reload-icon" onclick="reload();"><i class="fas fa-redo-alt"></i></span>
            <span class="reload-text">Reset</span>
          </div>
          <div class="items menu" onclick="menu();">
            <span class="menu-icon"><i class="fas fa-bars"></i></span> 
            <span class="menu-text">Menu</span>
          </div>
        </section>

        <section class="memory-game">
          <div class="memory-card" id="0" data-framework="aurelia">
            <img class="front-face" id="0" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 0 .".jpg" ?>" alt="Aurelia" />
            <img class="back-face" id="0" src="img/brain_3.jpg" ?>" alt="JS Badge" />
          </div>
          <div class="memory-card" id="0" data-framework="aurelia">
            <img class="front-face" id="0" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 0 .".jpg" ?>" alt="Aurelia" />
            <img class="back-face" id="0" src="img/brain_3.jpg" alt="JS Badge" />
          </div>



          <div class="memory-card" id="1" data-framework="vue">
            <img class="front-face" id="1" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 1 .".jpg" ?>" alt="Vue" />
            <img class="back-face" id="1" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="1" data-framework="vue">
            <img class="front-face" id="1" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 1 .".jpg" ?>" alt="Vue" />
            <img class="back-face" id="1" src="img/brain_3.jpg" alt="JS Badge" />
          </div>



          <div class="memory-card" id="2" data-framework="angular">
            <img class="front-face" id="2" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 2 .".jpg" ?>" alt="Angular" />
            <img class="back-face" id="2" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="2" data-framework="angular">
            <img class="front-face" id="2" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 2 .".jpg" ?>" alt="Angular" />
            <img class="back-face" id="2" src="img/brain_3.jpg" alt="JS Badge" />
          </div>



          <div class="memory-card" id="3" data-framework="ember">
            <img class="front-face" id="3" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 3 .".jpg" ?>" alt="Ember" />
            <img class="back-face" id="3" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="3" data-framework="ember">
            <img class="front-face" id="3" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 3 .".jpg" ?>"alt="Ember" />
            <img class="back-face" id="3" src="img/brain_3.jpg" alt="JS Badge" />
          </div>




          <div class="memory-card" id="4" data-framework="backbone">
            <img class="front-face" id="4" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 4 .".jpg" ?>" alt="Backbone" />
            <img class="back-face" id="4" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="4" data-framework="backbone">
            <img class="front-face" id="4" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 4 .".jpg" ?>" alt="Backbone" />
            <img class="back-face" id="4" src="img/brain_3.jpg" alt="JS Badge" />
          </div>




          <div class="memory-card" id="5" data-framework="react">
            <img class="front-face" id="5" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 5 .".jpg" ?>" alt="React" />
            <img class="back-face" id="5" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="5" data-framework="react">
            <img class="front-face" id="5" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 5 .".jpg" ?>" alt="React" />
            <img class="back-face" id="5" src="img/brain_3.jpg" alt="JS Badge" />
          </div>

        </section>
        <div class="translate">
          <div class="count translate_first"></div>
          <div class="count translate_second"></div>
          <div class="count translate_third"></div>
          <div class="count translate_forth"></div>
          <div class="count translate_fifth"></div>
          <div class="count translate_sixth"></div>
        </div>
      </main>
    <?php else : ?>
      <main class="easy">
        <section class="header-game">
          <h1>Memory game</h1>
          <div class="items star-mark">
            <span class="star-mark_first star"><i class="fas fa-star"></i></span>
            <span class="star-mark_second star"><i class="fas fa-star"></i></span>
            <span class="star-mark_third star"><i class="fas fa-star"></i></span>
            <span class="star-mark_text">Great!</span>
          </div>
          <div class="items moves">Moves: <span class="moves-count">0</span> </div>
          <div class="items time">Time: <span class="time-count">00:00:00</span> </div>
          <div class="items reload">
            <span class="reload-icon" onclick="reload();"><i class="fas fa-redo-alt"></i></span>
            <span class="reload-text">Reset</span>
          </div>
          <div class="items menu" onclick="menu();">
            <span class="menu-icon"><i class="fas fa-bars"></i></span> 
            <span class="menu-text" onclick="menu();">Menu</span>
          </div>
        </section>

        <section class="memory-game_easy">
          <div class="memory-card_easy" id="0" data-framework="aurelia">
            <img class="front-face" id="0" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 0 .".jpg" ?>" alt="Aurelia" />
            <img class="back-face" id="0" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card_easy" id="0" data-framework="aurelia">
            <img class="front-face" id="0" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 0 .".jpg" ?>" alt="Aurelia" />
            <img class="back-face" id="0" src="img/brain_3.jpg" alt="JS Badge" />
          </div>



          <div class="memory-card_easy" id="1" data-framework="vue">
            <img class="front-face" id="1" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 1 .".jpg" ?>" alt="Vue" />
            <img class="back-face" id="1" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card_easy" id="1" data-framework="vue">
            <img class="front-face" id="1" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 1 .".jpg" ?>" alt="Vue" />
            <img class="back-face" id="1" src="img/brain_3.jpg" alt="JS Badge" />
          </div>



          <div class="memory-card_easy" id="2" data-framework="angular">
            <img class="front-face" id="2" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 2 .".jpg" ?>" alt="Angular" />
            <img class="back-face" id="2" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card_easy" id="2" data-framework="angular">
            <img class="front-face" id="2" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 2 .".jpg" ?>" alt="Angular" />
            <img class="back-face" id="2" src="img/brain_3.jpg" alt="JS Badge" />
          </div>




          <div class="memory-card_easy" id="3" data-framework="ember">
            <img class="front-face" id="3" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 3 .".jpg" ?>" alt="Ember" />
            <img class="back-face" id="3" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card_easy" id="3" data-framework="ember">
            <img class="front-face" id="3" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 3 .".jpg" ?>" alt="Ember" />
            <img class="back-face" id="3" src="img/brain_3.jpg" alt="JS Badge" />
          </div>





          <div class="memory-card_easy" id="4" data-framework="backbone">
            <img class="front-face" id="4" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 4 .".jpg" ?>" alt="Backbone" />
            <img class="back-face" id="4" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card_easy" id="4" data-framework="backbone">
            <img class="front-face" id="4" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 4 .".jpg" ?>" alt="Backbone" />
            <img class="back-face" id="4" src="img/brain_3.jpg" alt="JS Badge" />
          </div>




          <div class="memory-card_easy" id="5" data-framework="react">
            <img class="front-face" id="5" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 5 .".jpg" ?>" alt="React" />
            <img class="back-face" id="5" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card_easy" id="5" data-framework="react">
            <img class="front-face" id="5" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 5 .".jpg" ?>" alt="React" />
            <img class="back-face" id="5" src="img/brain_3.jpg" alt="JS Badge" />
          </div>



        </section>
        <div class="translate">
          <div class="count translate_first"></div>
          <div class="count translate_second"></div>
          <div class="count translate_third"></div>
          <div class="count translate_forth"></div>
          <div class="count translate_fifth"></div>
          <div class="count translate_sixth"></div>
        </div>
      </main>
    <?php endif; ?>
    <script src="js/script_easy.js"></script>
  <?php else : 
    if( isset($_SESSION['name_of_theme']) ) : ?>


<!--       <div class="loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div> -->


      <main>
        <section class="header-game">
          <h1>Memory game</h1>
          <div class="items star-mark">
            <span class="star-mark_first star"><i class="fas fa-star"></i></span>
            <span class="star-mark_second star"><i class="fas fa-star"></i></span>
            <span class="star-mark_third star"><i class="fas fa-star"></i></span>
            <span class="star-mark_text">Great!</span>
          </div>
          <div class="items moves">Moves: <span class="moves-count">0</span> </div>
          <div class="items time">Time: <span class="time-count">00:00:00</span> </div>
          <div class="items reload">
            <span class="reload-icon" onclick="reload();"><i class="fas fa-redo-alt"></i></span>
            <span class="reload-text">Reset</span>
          </div>
          <div class="items menu" onclick="menu();">
            <span class="menu-icon"><i class="fas fa-bars"></i></span> 
            <span class="menu-text">Menu</span>
          </div>
        </section>

        <section class="memory-game">
          <div class="memory-card" id="0" data-framework="aurelia">
            <img class="front-face" id="0" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 0 .".jpg" ?>" alt="Aurelia" />
            <img class="back-face" id="0" src="img/brain_3.jpg" ?>" alt="JS Badge" />
          </div>
          <div class="memory-card" id="0" data-framework="aurelia">
            <img class="front-face" id="0" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 0 .".jpg" ?>" alt="Aurelia" />
            <img class="back-face" id="0" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="0" data-framework="aurelia">
            <img class="front-face" id="0" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 0 .".jpg" ?>" alt="Aurelia" />
            <img class="back-face" id="0" src="img/brain_3.jpg" alt="JS Badge" />
          </div>



          <div class="memory-card" id="1" data-framework="vue">
            <img class="front-face" id="1" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 1 .".jpg" ?>" alt="Vue" />
            <img class="back-face" id="1" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="1" data-framework="vue">
            <img class="front-face" id="1" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 1 .".jpg" ?>" alt="Vue" />
            <img class="back-face" id="1" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="1" data-framework="vue">
            <img class="front-face" id="1" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 1 .".jpg" ?>" alt="Vue" />
            <img class="back-face" id="1" src="img/brain_3.jpg" alt="JS Badge" />
          </div>



          <div class="memory-card" id="2" data-framework="angular">
            <img class="front-face" id="2" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 2 .".jpg" ?>" alt="Angular" />
            <img class="back-face" id="2" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="2" data-framework="angular">
            <img class="front-face" id="2" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 2 .".jpg" ?>" alt="Angular" />
            <img class="back-face" id="2" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="2" data-framework="angular">
            <img class="front-face" id="2" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 2 .".jpg" ?>" alt="Angular" />
            <img class="back-face" id="2" src="img/brain_3.jpg" alt="JS Badge" />
          </div>



          <div class="memory-card" id="3" data-framework="ember">
            <img class="front-face" id="3" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 3 .".jpg" ?>" alt="Ember" />
            <img class="back-face" id="3" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="3" data-framework="ember">
            <img class="front-face" id="3" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 3 .".jpg" ?>"alt="Ember" />
            <img class="back-face" id="3" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="3" data-framework="ember">
            <img class="front-face" id="3" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 3 .".jpg" ?>" alt="Ember" />
            <img class="back-face" id="3" src="img/brain_3.jpg" alt="JS Badge" />
          </div>




          <div class="memory-card" id="4" data-framework="backbone">
            <img class="front-face" id="4" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 4 .".jpg" ?>" alt="Backbone" />
            <img class="back-face" id="4" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="4" data-framework="backbone">
            <img class="front-face" id="4" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 4 .".jpg" ?>" alt="Backbone" />
            <img class="back-face" id="4" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="4" data-framework="backbone">
            <img class="front-face" id="4" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 4 .".jpg" ?>" alt="Backbone" />
            <img class="back-face" id="4" src="img/brain_3.jpg" alt="JS Badge" />
          </div>




          <div class="memory-card" id="5" data-framework="react">
            <img class="front-face" id="5" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 5 .".jpg" ?>" alt="React" />
            <img class="back-face" id="5" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="5" data-framework="react">
            <img class="front-face" id="5" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 5 .".jpg" ?>" alt="React" />
            <img class="back-face" id="5" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="5" data-framework="react">
            <img class="front-face" id="5" src="<?php echo "admin/" . $_SESSION['name_of_theme'] . "/" . 5 .".jpg" ?>" alt="React" />
            <img class="back-face" id="5" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
        </section>
        <div class="translate">
          <div class="count translate_first"></div>
          <div class="count translate_second"></div>
          <div class="count translate_third"></div>
          <div class="count translate_forth"></div>
          <div class="count translate_fifth"></div>
          <div class="count translate_sixth"></div>
        </div>
      </main>
    <?php else : ?>
      <main>
        <section class="header-game">
          <h1>Memory game</h1>
          <div class="items star-mark">
            <span class="star-mark_first star"><i class="fas fa-star"></i></span>
            <span class="star-mark_second star"><i class="fas fa-star"></i></span>
            <span class="star-mark_third star"><i class="fas fa-star"></i></span>
            <span class="star-mark_text">Great!</span>
          </div>
          <div class="items moves">Moves: <span class="moves-count">0</span> </div>
          <div class="items time">Time: <span class="time-count">00:00:00</span> </div>
          <div class="items reload">
            <span class="reload-icon" onclick="reload();"><i class="fas fa-redo-alt"></i></span>
            <span class="reload-text">Reset</span>
          </div>
          <div class="items menu" onclick="menu();">
            <span class="menu-icon"><i class="fas fa-bars"></i></span> 
            <span class="menu-text" onclick="menu();">Menu</span>
          </div>
        </section>

        <section class="memory-game">
          <div class="memory-card" id="0" data-framework="aurelia">
            <img class="front-face" id="0" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 0 .".jpg" ?>" alt="Aurelia" />
            <img class="back-face" id="0" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="0" data-framework="aurelia">
            <img class="front-face" id="0" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 0 .".jpg" ?>" alt="Aurelia" />
            <img class="back-face" id="0" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="0" data-framework="aurelia">
            <img class="front-face" id="0" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 0 .".jpg" ?>" alt="Aurelia" />
            <img class="back-face" id="0" src="img/brain_3.jpg" alt="JS Badge" />
          </div>



          <div class="memory-card" id="1" data-framework="vue">
            <img class="front-face" id="1" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 1 .".jpg" ?>" alt="Vue" />
            <img class="back-face" id="1" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="1" data-framework="vue">
            <img class="front-face" id="1" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 1 .".jpg" ?>" alt="Vue" />
            <img class="back-face" id="1" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="1" data-framework="vue">
            <img class="front-face" id="1" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 1 .".jpg" ?>" alt="Vue" />
            <img class="back-face" id="1" src="img/brain_3.jpg" alt="JS Badge" />
          </div>



          <div class="memory-card" id="2" data-framework="angular">
            <img class="front-face" id="2" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 2 .".jpg" ?>" alt="Angular" />
            <img class="back-face" id="2" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="2" data-framework="angular">
            <img class="front-face" id="2" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 2 .".jpg" ?>" alt="Angular" />
            <img class="back-face" id="2" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="2" data-framework="angular">
            <img class="front-face" id="2" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 2 .".jpg" ?>" alt="Angular" />
            <img class="back-face" id="2" src="img/brain_3.jpg" alt="JS Badge" />
          </div>



          <div class="memory-card" id="3" data-framework="ember">
            <img class="front-face" id="3" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 3 .".jpg" ?>" alt="Ember" />
            <img class="back-face" id="3" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="3" data-framework="ember">
            <img class="front-face" id="3" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 3 .".jpg" ?>" alt="Ember" />
            <img class="back-face" id="3" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="3" data-framework="ember">
            <img class="front-face" id="3" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 3 .".jpg" ?>" alt="Ember" />
            <img class="back-face" id="3" src="img/brain_3.jpg" alt="JS Badge" />
          </div>




          <div class="memory-card" id="4" data-framework="backbone">
            <img class="front-face" id="4" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 4 .".jpg" ?>" alt="Backbone" />
            <img class="back-face" id="4" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="4" data-framework="backbone">
            <img class="front-face" id="4" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 4 .".jpg" ?>" alt="Backbone" />
            <img class="back-face" id="4" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="4" data-framework="backbone">
            <img class="front-face" id="4" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 4 .".jpg" ?>" alt="Backbone" />
            <img class="back-face" id="4" src="img/brain_3.jpg" alt="JS Badge" />
          </div>




          <div class="memory-card" id="5" data-framework="react">
            <img class="front-face" id="5" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 5 .".jpg" ?>" alt="React" />
            <img class="back-face" id="5" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="5" data-framework="react">
            <img class="front-face" id="5" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 5 .".jpg" ?>" alt="React" />
            <img class="back-face" id="5" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
          <div class="memory-card" id="5" data-framework="react">
            <img class="front-face" id="5" src="<?php echo "admin/" . $_SESSION['selected_theme'] . "/" . 5 .".jpg" ?>" alt="React" />
            <img class="back-face" id="5" src="img/brain_3.jpg" alt="JS Badge" />
          </div>
        </section>
        <div class="translate">
          <div class="count translate_first"></div>
          <div class="count translate_second"></div>
          <div class="count translate_third"></div>
          <div class="count translate_forth"></div>
          <div class="count translate_fifth"></div>
          <div class="count translate_sixth"></div>
        </div>
      </main>
    <?php endif; ?>
    <script src="js/script.js"></script> 
<!--     <script src="js/preloader.js"></script>  -->
  <?php endif; ?>

  

  
  <script src="js/preloader.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
  
</body>
</html>

<?php else : ?><!--Else login-->
  <script>
    window.location.href = "index.html";
  </script>
<?php endif; ?><!--Close login-->
