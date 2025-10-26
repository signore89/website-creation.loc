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

function get_alerts(){
    $elerts = [
        "success",
        "danger",
        "info",
        "warning",
    ];

    function get_alert($type){
        echo "<div class='alert alert-{$type} alert-dismissible fade show' role='alert'>
                {$_SESSION[$type]}
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }

    if(!empty($_SESSION)){
        echo "<div class = 'conteiner py-3'>";
        foreach($_SESSION as $key => $value){
            if(in_array($key, $elerts)){
                get_alert($key);
                unset($_SESSION[$key]);
            }
        }
    echo "</div>";
    }
}