<?

global $db;

$api_data = json_decode(file_get_contents('php://input'),1);

$data = $api_data ?? $_POST;
$id = (int)$data['user_id'] ?? 0;

$db->query('DELETE FROM `users` WHERE `user_id` = ?',[$id]);

if($db->rowCount()){
   $res['answer'] = $_SESSION['success'] = "Пользователь успешно удален";
}else{
    $res['answer'] =  $_SESSION['danger'] = "Ошибка удаления";
}

if($api_data){
    echo json_encode($res);
    die;
}else{
    redirect('users');
}