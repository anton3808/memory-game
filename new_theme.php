<?php
    require "db.php";
    if(isset($_FILES['image'])){
        $data = $_POST;
        $author =  $_SESSION['logged_user']->login;
        $name_of_theme = $data["name_of_theme"];

        $file_tmp = $_FILES['image']['tmp_name'];
        $file_tmps = $_FILES['images']['tmp_name'];

        $file_name = $_FILES['image']['name'];
        $file_names = $_FILES['images']['name'];
        
        $text_name_1 = $_REQUEST['text_1'];
        $text_name_2 = $_REQUEST['text_2'];
        $text_name_3 = $_REQUEST['text_3'];
        $text_name_4 = $_REQUEST['text_4'];
        $text_name_5 = $_REQUEST['text_5'];
        $text_name_6 = $_REQUEST['text_6'];

        $errors = array();
        $file_size = $_FILES['image']['size'];
        // $file_ext = strtolower(end(explode(".", $_FILES['image']['name'])));

        // if($file_size > 2097152){
        //     $errors[] = "Файл повинен бути 2 мб";
        // }
        $name_of_images = array();

        if( count($file_name) > 6){
            $errors[] = "Загрузите пожалуста только 6 файлов";
        }

        if( count($file_names) > 6){
            $errors[] = "Загрузите пожалуста только 6 файлов";
        }

        if( empty($errors) == true){
            // if ( is_dir($author) === false){
            //     mkdir($author);
            // }

            $name_of_theme_win = iconv('UTF-8', 'Windows-1251', $name_of_theme);
            
            // if( is_dir($author . "/" . $name_of_theme_win) === false ){
            //     mkdir($author . "/" . $name_of_theme_win); 
            if( is_dir("admin/" . $name_of_theme_win) === false ){
                mkdir("admin/" . $name_of_theme_win);  


                for($i = 0; $i < count($file_name); $i++){  
                    move_uploaded_file($file_tmp[$i], "admin/" . $name_of_theme_win . "/" . $file_name[$i]);
                    rename ( "admin/" . $name_of_theme_win . "/" . $file_name[$i],  "admin/" . $name_of_theme_win . "/" . $i .".jpg");
                } 

                for($i = 0; $i < count($file_name); $i++){  
                    move_uploaded_file($file_tmps[$i], "admin/" . $name_of_theme_win . "/" . $file_names[$i]);
                    rename ( "admin/" . $name_of_theme_win . "/" . $file_names[$i],  "admin/" . $name_of_theme_win . "/" . $i .".jpg");
                } 
                
                $_SESSION['name_of_theme'] = $name_of_theme;

                $json = json_decode( file_get_contents("themes.json") );
                $jsonerror = "Неизвесная ошибка";
                switch (json_last_error() ){
                    case JSON_ERROR_NONE:
                        $jsonerror = '';
                        break;
                    case JSON_ERROR_DEPTH:
                        $jsonerror = 'Достигнута максимальная глубина стека';
                        break;
                    case JSON_ERROR_STATE_MISMATCH:
                        $jsonerror = 'Некорректные разряды или не совпадение режимов';
                        break;
                    case JSON_ERROR_CTRL_CHAR:
                        $jsonerror = 'Некорректный управляющий символ';
                        break;
                    case JSON_ERROR_SYNTAX:
                        $jsonerror = 'Синтаксическая ошибка, не корректный JSON';
                        break; 
                    case JSON_ERROR_UTF8:
                        $jsonerror = 'Некорректные символы UTF-8, озможно неверная кодировка';
                        break; 
                    default:
                        $jsonerror = 'Неизвесная ошибка';
                        break;  
                }

                if ( $jsonerror != '' ){
                    echo $jsonerror;
                }else {
                    array_push($json, $name_of_theme);
                    file_put_contents("themes.json", json_encode($json));
                }   


                $json_tran = json_decode( file_get_contents("translate.json") );


                function before ($before, $string){
                    return substr($string, 0, strpos($string, $before));
                }

                $names = array();

                for($i = 0; $i < count($file_name); $i++){  
                    $names[] = substr($file_name[$i], 0, strpos($file_name[$i], "."));
                } 


                


                $translate = [
                    $name_of_theme, 
                    
                    'UA' => [
                        "0" => $text_name_1,
                        "1" => $text_name_2,
                        "2" => $text_name_3,
                        "3" => $text_name_4,
                        "4" => $text_name_5,
                        "5" => $text_name_6,

                    ],

                    "EN" => [
                        "0" => $names[0],
                        "1" => $names[1],
                        "2" => $names[2],
                        "3" => $names[3],
                        "4" => $names[4],
                        "5" => $names[5],
                    ]  
                ];

                array_push($json_tran, $translate);

                file_put_contents("translate.json", json_encode($json_tran, JSON_PRETTY_PRINT));


                echo $name_of_theme;
            }else{
                echo "Ця назва для теми вже занята";
            }
            
        }else{
            echo array_shift($errors);
        }
    }else if(isset($_FILES['images'])){
        $data = $_POST;
        $author =  $_SESSION['logged_user']->login;
        $name_of_theme = $data["name_of_theme"];

        $file_tmps = $_FILES['images']['tmp_name'];

        $file_names = $_FILES['images']['name'];

        $errors = array();
        $file_size = $_FILES['images']['size'];

        $name_of_images = array();

        if( count($file_names) > 6){
            $errors[] = "Загрузите пожалуста только 6 файлов";
        }

        if( empty($errors) == true){

            $name_of_theme_win = iconv('UTF-8', 'Windows-1251', $name_of_theme);
            
            // if( is_dir($author . "/" . $name_of_theme_win) === false ){
            //     mkdir($author . "/" . $name_of_theme_win); 
            if( is_dir("admin/" . $name_of_theme_win) === false ){
                mkdir("admin/" . $name_of_theme_win);  

                for($i = 0; $i < count($file_names); $i++){  
                    move_uploaded_file($file_tmps[$i], "admin/" . $name_of_theme_win . "/" . $file_names[$i]);
                    rename ( "admin/" . $name_of_theme_win . "/" . $file_names[$i],  "admin/" . $name_of_theme_win . "/" . $i .".jpg");
                } 
                
                $_SESSION['name_of_theme'] = $name_of_theme;

                $json = json_decode( file_get_contents("themes.json") );
                $jsonerror = "Неизвесная ошибка";
                switch (json_last_error() ){
                    case JSON_ERROR_NONE:
                        $jsonerror = '';
                        break;
                    case JSON_ERROR_DEPTH:
                        $jsonerror = 'Достигнута максимальная глубина стека';
                        break;
                    case JSON_ERROR_STATE_MISMATCH:
                        $jsonerror = 'Некорректные разряды или не совпадение режимов';
                        break;
                    case JSON_ERROR_CTRL_CHAR:
                        $jsonerror = 'Некорректный управляющий символ';
                        break;
                    case JSON_ERROR_SYNTAX:
                        $jsonerror = 'Синтаксическая ошибка, не корректный JSON';
                        break; 
                    case JSON_ERROR_UTF8:
                        $jsonerror = 'Некорректные символы UTF-8, озможно неверная кодировка';
                        break; 
                    default:
                        $jsonerror = 'Неизвесная ошибка';
                        break;  
                }

                if ( $jsonerror != '' ){
                    echo $jsonerror;
                }else {
                    array_push($json, $name_of_theme);
                    file_put_contents("themes.json", json_encode($json));
                }   


                echo $name_of_theme;
            }else{
                echo "Ця назва для теми вже занята";
            }
            
        }else{
            echo array_shift($errors);
        }
    }else{
        echo "Error";
    }
?>