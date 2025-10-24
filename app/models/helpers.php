<?
function dump($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function dd($data){
    dump($data);
    die;
}

function abort($code = "404"){
    $title = $code;
    $header = "$code - ";
    switch ($code) {
        case '404':
            $header .= "страница не найдена";
            break;
        case '500':
            $header .= "Ошибка на строне сервера";
            break;
        
        default:
            # code...
            break;
    }
    require_once(VIEWS."/error.tmpl.php");
}

function load_req_data($fillable){
    $data = [];
    foreach($_POST as $key => $val){
        if(in_array($key, $fillable)){
            $data[$key] = trim(htmlentities($val));
        }
    }

    return $data;
}

function old($field_name){
    return isset($_POST[$field_name]) ? h($_POST[$field_name]) : "";
}

function h($str){
    return trim(htmlentities($str,ENT_QUOTES));
}

function redirect ($url = ''){
    if($url){
        $redirect = $url;
    }else{
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: {$redirect}");
    die;
}

// возвращает количество символов в строке
function len($str){
    return mb_strlen($str,'UTF-8');
}

// валидация данных заполняемых пользователем
function validate(string $name,string $email, string $password, string $passwordConfirm){
    $errors = [];

    if(empty($name) || empty($email) || empty($password) || empty($passwordConfirm)){
        $errors[] = "Заполните поля";
    }

    elseif($password != $passwordConfirm){
        $errors[] = "Пароли не совпадают"; 
    }

    elseif (len($name) < 3 || len($name) > 15){
        $errors[] = "данные должны быть не меньше 3 и не больше 15";
    }
    elseif (len($password) < 3 || len($password) > 30){
        $errors[] = "данные должны быть не меньше 3 и не больше 30";
    }
    return $errors;
}


//регистрация пользователя
function regUsers(string $name,string $email, string $password, string $passwordConfirm){
    $errors = [];
    // require_once 'config.php';// на этапе удаления
    $name = trim(htmlentities($name));
    $email = trim(htmlentities($email));
    $password = trim(htmlentities($password));
    $passwordConfirm = trim(htmlentities($passwordConfirm));
    $errors = validate($name,$email,$password,$passwordConfirm);
    return $errors;
}