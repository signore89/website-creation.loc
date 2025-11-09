<?
global $db;
require_once MODELS.'/Validator.php';


    $fillable = ['user_id','login','email'];
    $data = load_req_data($fillable);
    $rules = [
        'title' => [
            'required' => true,
            'min' => 3,
            'max' => 8
        ],
        'descr' => [
            'required' => true,
            'min' => 3,
            'max' => 8
        ],
        'content' => [
            'required' => true,
            'min' => 5
        ]
    ];

    

    $validator = new Validator();
    $validation = $validator->validate($data,$rules);
    if(!$validation->hasErrors()){
        try{
            $db->query("UPDATE users SET login = ?, email = ? WHERE user_id = ?",
            [$data['login'],$data['email'],$data['user_id']]);
            $_SESSION['success'] = "Пользователь успешно изменен";
        }catch (PDOException $e){
            $_SESSION['error'] = "Что то пошло не так" ;
        }
        $url = "user?id=".$data['user_id'];
        redirect($url);
    }else{
        require_once VIEWS."/edit_show_user.tmpl.php";
    }