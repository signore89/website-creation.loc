<?

global $db;

$data = json_decode(file_get_contents('php://input'),1);

if($data){
    $id = (int)$data['post_id'] ?? 0;
    $action = (int)$data['action'] ?? 0;
    $rate = $db->query("SELECT `rate` FROM `posts` WHERE `post_id` = ?",[$id])->getColumn();
    $rate = (int)$rate ?? 0;
    $rate += $action;

    $db->query("UPDATE `posts` SET `rate` = ? WHERE `post_id` = ?", [$rate,$id]);
    echo $rate;
}