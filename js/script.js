const cards = document.querySelectorAll('.memory-card');

let gameInterval;
let hasFlippedCard = false;
let hasFlippedCardSecond = false;
let lockBoard = false;
let moves = 0;
let minutes = 0;
let seconds = 0;
let firstCard, secondCard, thirdCard;
let matched = 0;
let text_mark = "Great!";



function moveCounter(){
  moves++;
  if(moves == 1){
    timer();
  } else if (moves >= 40){
    $('.star-mark_third').html("");
    text_mark = "Average";
    $('.star-mark_text').html(text_mark);
  } else if (moves >= 60){
    $('.star-mark_second').html("");
    text_mark = "Poor";
    $('.star-mark_text').html(text_mark);
  }

  $('.moves-count').html(moves);
}



function flipCard() {
  if (lockBoard) return;
  if (this === firstCard) return;

  this.classList.add('flip');
  moveCounter();

  if (!hasFlippedCard) {
    hasFlippedCard = true;
    firstCard = this;

    return;
  }

  if (!hasFlippedCardSecond) {
    hasFlippedCardSecond = true;
    secondCard = this;
    checkForTwoMatch();

    return;
  }

  thirdCard = this;
  checkForTheeMatch();
}



function checkForTwoMatch() {
  let isMatch = firstCard.dataset.framework === secondCard.dataset.framework;

  isMatch ? flipCard() : unflipTwoCards();
}
function disableTwoCards() {
  setTimeout(() => {
	  firstCard.classList.toggle('hide');
	  secondCard.classList.toggle('hide');

	  resetBoard();
  }, 300);
}
function unflipTwoCards() {
  lockBoard = true;

  setTimeout(() => {
    firstCard.classList.remove('flip');
    secondCard.classList.remove('flip');

    resetBoard();
  }, 1500);
}




function checkForTheeMatch() {
  let isMatch = firstCard.dataset.framework === secondCard.dataset.framework;
  isMatch = firstCard.dataset.framework === thirdCard.dataset.framework;

  isMatch ? disableThreeCards() : unflipThreeCards();
}
function disableThreeCards() {
  setTimeout(() => {
	  firstCard.classList.toggle('hide');
	  secondCard.classList.toggle('hide');
	  thirdCard.classList.toggle('hide');

    print_words(thirdCard);

	  resetBoard();
    matched_cards();
    
  }, 300);
}

function print_words(event){
  var ID = $(event).attr("id");
  $.ajax({
    url: 'print_words.php',
    data: {id: ID},
    success: function(data){
      var first = $('.translate_first').text();
      var second = $('.translate_second').text();
      var third = $('.translate_third').text();
      var forth = $('.translate_forth').text();
      var fifth = $('.translate_fifth').text();
      var sixth = $('.translate_sixth').text();


      if ( sixth == "" ) {
        $('.translate_sixth').html(data);
      } else if ( fifth == "" ) {
        $('.translate_fifth').html(data);
      } else if ( forth == "" ) {
        $('.translate_forth').html(data);
      } else if ( third == "" ) {
        $('.translate_third').html(data);
      } else if ( second == "" ) {
        $('.translate_second').html(data);
      } else if ( first == "" ) {
        $('.translate_first').html(data);
      }
    }
  });
  // alert(ID);
}

function unflipThreeCards() {
  lockBoard = true;

  setTimeout(() => {
    firstCard.classList.remove('flip');
    secondCard.classList.remove('flip');
    thirdCard.classList.remove('flip');

    resetBoard();
  }, 1500);
}





function resetBoard() {
  [hasFlippedCard, lockBoard, hasFlippedCardSecond] = [false, false, false];
  [firstCard, secondCard, thirdCard] = [null, null, null];
}

(function shuffle() {
  cards.forEach(card => {
    let randomPos = Math.floor(Math.random() * 18);
    card.style.order = randomPos;
  });
})();

cards.forEach(card => card.addEventListener('click', flipCard));








function reload(){
  stop_timer();

  cards.forEach(card => {
    card.classList.remove('hide');
    card.classList.remove('flip');
  });
  moves = 0;
  $('.moves-count').html(moves);
  minutes = 0;
  seconds = 0;
  
  seconds = seconds < 10 ? "0" + seconds : seconds;
  minutes = minutes < 10 ? "0" + minutes : minutes;
  $('.time-count').html("00:" + minutes + ":" + seconds);
  cards.forEach(card => {
    let randomPos = Math.floor(Math.random() * 18);
    card.style.order = randomPos;
  });

  setTimeout(() => {
    $('.translate_sixth').html("");
    $('.translate_fifth').html("");
    $('.translate_forth').html("");
    $('.translate_third').html("");
    $('.translate_second').html("");
    $('.translate_first').html("");
  }, 300);
  

}

function timer(){
  gameInterval = setInterval(function () {
    seconds = parseInt(seconds, 10) + 1;
    minutes = parseInt(minutes, 10);
    if (seconds >= 60) {
      minutes += 1;
      seconds = 0;
    }

    seconds = seconds < 10 ? "0" + seconds : seconds;
    minutes = minutes < 10 ? "0" + minutes : minutes;

    $('.time-count').html("00:" + minutes + ":" + seconds);
  }, 1000);
}

function stop_timer(){
  clearInterval(gameInterval);
}




function matched_cards(){
  matched++;
  if(matched==6){
      if(minutes==0){
        time = seconds;
      }else if(minutes==1){
        time = 60;
        time += seconds;
      }else if(minutes==2){
        time = 120;
        time += seconds;
      }else if(minutes==3){
        time = 180;
        time += seconds;
      }
      else if(minutes==4){
        time = 240;
        time += seconds;
      }else if(minutes==5){
        time = 300;
        time += seconds;
      }else if(minutes==6){
        time = 360;
        time += seconds;
      }else if(minutes==7){
        time = 420;
        time += seconds;
      }else if(minutes==8){
        time = 480;
        time += seconds;
      }else if(minutes==9){
        time = 540;
        time += seconds;
      }else if(minutes==10){
        time = 600;
        time += seconds;
      }
      $.ajax({
        url: 'results.php',
        data: {matched: matched, moves: moves, time: time},
        success: function(data){
          alert(data);
        }
      });
    // alert("You win. Matched " + matched + ". Moves " + moves + ". Time " + "00:" + minutes + ":" + seconds);
    reload();
  }
}


function menu(){
  location.href = "menu.php";
}



