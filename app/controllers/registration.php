<?
global $db;
$title = $header = "Регистрация";
require_once MODELS.'/Validator.php';

require_once MODELS.'/helpers.php';
// require_once MODELS.'/DB.php';

if($_SERVER['REQUEST_METHOD']== "POST"){
    $errors = [];
    $fillable = ['login','email','password','password_confirm'];
    $data = load_req_data($fillable);

    $rules = [
        'login' => [
            'required' => true,
            'min' => 3,
            'max' => 8
        ],
        'email' =>[
            'required' => true
        ],
        'password' => [
            'required' => true,
            'min' => 3
        ],
        'password_confirm' => [
            'match' => 'password'
        ]
    ];
    
    $validator = new Validator();
    $validation = $validator->validate($data,$rules);
    
    if(!$validation->hasErrors()){
        try{
            $registeredUsers = $db->query("SELECT `user_id` FROM `users` WHERE `email` = ? OR `login` = ?",
            [$data['email'],$data['login']])->findAll();// ПЕРЕДЕЛАТЬ
            if(count($registeredUsers) > 0){
                $_SESSION['warning'] = "Пользователь с таким email или именем уже существует";
            }else{
                $hash_pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
                $db->query("INSERT INTO `users` (`login`, `password`, `email`) VALUES (?, ?, ?)",
                    [$data['login'],$hash_pass,$data['email']]);

                 $_SESSION['success'] = "Новый пользователь успешно добавлен";
                 redirect('home');
            }    
        }catch(PDOException $e){
            $_SESSION['danger'] = "Что то пошло не так ".$e->getMessage() ;
        }
    }
}

require_once VIEWS."/posts/registration.tmpl.php";
