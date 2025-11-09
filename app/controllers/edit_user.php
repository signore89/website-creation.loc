<?

global $db;

global $db;
$id = (int)$_GET['id'];

$edit_user = $db->query('SELECT * FROM `users` WHERE `user_id` = ?',[$id])->findOrAbort();

require_once VIEWS."/edit_show_user.tmpl.php";