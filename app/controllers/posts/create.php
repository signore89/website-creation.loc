<?
require_once MODELS.'/Validator.php';
if($_SERVER['REQUEST_METHOD']== "POST"){
    
    
    $errors = [];

    $fillable = ['title','descr','content'];
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

    // if(empty($data['title'])){
    //     $errors['title'] = "название обезательное";
    // }
    // if(empty($data['descr'])){
    //     $errors['descr'] = "описание обезательное";
    // }
    // if(empty($data['content'])){
    //     $errors['content'] = "содержание обезательное";
    // }

    // if(empty($errors)){
    //     $db->query("INSERT INTO `posts`(`title`, `descr`, `content`) VALUES (?,?,?)",
    //         [$data['title'],$data['descr'],$data['content']]);
    // }
}


$title = $header = "Новый пост";

require_once VIEWS."/posts/create.tmpl.php";