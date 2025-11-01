<?
global $db;
$title = $header = "Личный кабинет";
require_once MODELS.'/Validator.php';

require_once MODELS.'/helpers.php';
// require_once MODELS.'/DB.php';

if($_SERVER['REQUEST_METHOD']== "POST"){
    $errors = [];
    $fillable = ['login','password'];
    $data = load_req_data($fillable);

    $rules = [
        'login' => [
            'required' => true,
            'min' => 3,
            'max' => 8
        ],
        'password' => [
            'required' => true,
            'min' => 3
        ]
    ];
    
    $validator = new Validator();
    $validation = $validator->validate($data,$rules);
    
    if(!$validation->hasErrors()){
        $flag = false;
        try{
            $registeredUser = $db->query("SELECT `user_id` FROM `users` WHERE `login` = ?",
            [$data['login']])->findAll();
            if(count($registeredUser) == 0){
                $_SESSION['warning'] = "Пользователя с таким именем не существует";
            }else{
                    $user = $db->query("SELECT * FROM `users` WHERE `user_id` = ?",
                        [(int)$registeredUser])->find();
                    $flag = password_verify($data["password"], $user["password"]);
                    if ($flag){
                        $_SESSION['success'] = "Вы вошли в личный кабинет как ".$user['name'];
                        redirect('home');
                    }else{
                        $validator->addError("authentication","Не верный пароль");
                    }    
            }    
        }catch(PDOException $e){
            $_SESSION['danger'] = "Что то пошло не так ".$e->getMessage() ;
        }
    }
}

require_once VIEWS."/posts/login.tmpl.php";
