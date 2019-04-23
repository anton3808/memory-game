//Смена одной форми на другую
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});


//Отправка данных с формы для входа
$("#myform").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "login.php",
        data: $("#myform").serialize(),
        success: function(data) {
            if(data == "Неверно введен пароль!") {
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
                $(".no_in_base").html(data);
            } else if(data == "Пользователь с таким логином не найден!") {
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
                $(".no_in_base").html(data);
            } else {
                location.href = "menu.php?accid="+data;
            }
        }
    });
});


//Отправка данных с формы для регистрации
$("#registration").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "signup.php",
        data: $("#registration").serialize(),
        success: function(data) {
            if(data == "Пользователь с таким Логином существует !") {
                $("#name").val("");
                $("#password").val("");
                $("#email").val("");
                $(".no_in_base").html(data);
            } else if (data == "Пользователь с таким Email существует !"){
                $("#name").val("");
                $("#password").val("");
                $("#email").val("");
                $(".no_in_base").html(data);
            } else if(data == "Ви зарегеструвались! Ввійдіть в акаунт!") {
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
                $(".no_in_base_login").html(data);
            }
        }
    });
});


//Создание новой теми для игры отправка шести фото
$("#create_theme").submit(function(e) {
    e.preventDefault();
    var form_data = new FormData(this);
    $.ajax({
        type: "POST",
        url: "new_theme.php",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: form_data,
        success: function(data) {
            if( data == "Ця назва для теми вже занята" ){
                alert(data);
            } else if ( data == "Загрузите пожалуста только 6 файлов" ){
                alert(data);
            } else if ( data == "Error" ) {
                alert(data);
            } else {
                location.href = "game.php";
            }
        }
    });
});


//Создание новой теми для игры отправка шести фото
$("#create_themes").submit(function(e) {
    e.preventDefault();
    var form_data = new FormData(this);
    $.ajax({
        type: "POST",
        url: "new_theme.php",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data: form_data,
        success: function(data) {
            if( data == "Ця назва для теми вже занята" ){
                alert(data);
            } else if ( data == "Загрузите пожалуста только 6 файлов" ){
                alert(data);
            } else if ( data == "Error" ) {
                alert(data);
            } else {
                location.href = "game.php";
            }
        }
    });
});


//ето самовизывающиися функция (Immediately Invoked Function Expression (IIFE)) для подгрузки названий тем с themes.json файла
(function list_of_themes() {
    $.getJSON( "../themes.json", function( data ) {
        $.each( data, function( index, element ) {
            $('.select-themes').append("<option value=" + element + ">" + element + "</option>");//добавляє до списка ше одну тему
        });
    });
})();





//выбор теми игры из списка 
$("#choose_theme_form").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "select_theme.php",
        data: $("#choose_theme_form").serialize(),
        success: function(data) {
            location.href = "game.php";
        }
    });
});

function exit(){
    location.href = "logout.php";
}