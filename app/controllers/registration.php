<?
$title = $header = "Регистрация";
require_once MODELS.'/Validator.php';

require_once MODELS.'/helpers.php';
// require_once MODELS.'/DB.php';

if($_SERVER['REQUEST_METHOD']== "POST"){
    $errors = [];
    $fillable = ['login','email','password','password_confirm'];
    $data = load_req_data($fillable);
    // $data2 = [
    //     "email" => "taranovskij89@mail.ru.",
    //     'pass' => '1234',
    //     'pass_confirm' => '234'
    // ];
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
    // dd($validation->getErrors());
    
    // $errors = regUsers($_POST['login'],$_POST['email'],$_POST['password'],$_POST['password_confirm']);
    if(!$validation->hasErrors()){
        try{
            $registeredUsers = $db->query("SELECT `user_id` FROM `users` WHERE `email` = ? OR `login` = ?",
            [$_POST['email'],$_POST['login']])->findAll();
            if(count($registeredUsers) > 0){
                $_SESSION['errorRegistration'] = "Пользователь с таким email или именем уже существует";
                // dd("не получилось");
            }else{
                $hash_pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
                $db->query("INSERT INTO `users` (`login`, `password`, `email`) VALUES (?, ?, ?)",
                    [$_POST['login'],$hash_pass,$_POST['email']]);

                 $_SESSION['RegistartionSuccess'] = "Новый пользователь успешно добавлен";
                 redirect('home');
            }    
        }catch(PDOException $e){
            $_SESSION['errorRegistration'] = "Что то пошло не так ".$e->getMessage() ;
        }
    }
}

require_once VIEWS."/posts/registration.tmpl.php";
