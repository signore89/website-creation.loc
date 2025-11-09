<?
global $db;
$id = (int)$_GET['id'];

$user = $db->query("SELECT * FROM `users` WHERE `user_id` = ?", [$id])->findOrAbort();

require_once VIEWS."/user_show.tmpl.php";