<?
global $db;
require_once MODELS.'/Validator.php';


    $fillable = ['post_id','title','descr','content'];
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
            $db->query("UPDATE posts SET title = ?, descr = ?, content = ? WHERE post_id = ?",
            [$data['title'],$data['descr'],$data['content'],$data['post_id']]);
            $_SESSION['success'] = "Пост успешно изменен";
        }catch (PDOException $e){
            $_SESSION['error'] = "Что то пошло не так" ;
        }
        $url = "post?id=".$data['post_id'];
        redirect($url);
    }else{
        require_once VIEWS."/posts/edit.tmpl.php";
    }