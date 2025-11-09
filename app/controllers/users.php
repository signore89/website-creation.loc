<?
global $db;
require_once MODELS."/Pagination.php";
$title = "Сайт";
$header = "Недавние посты";

$page = $_GET['page'] ?? 1;
$total = $db->query('SELECT COUNT(*) FROM `users`')->getColumn(); // общее количество
$pagination = new Pagination($page,$total);

$start_id = $pagination->getStartId();
$users = $db->query("SELECT * FROM `users` ORDER BY `user_id` DESC LIMIT $start_id, $pagination->perPage")->findAll();
require_once(VIEWS."/index.tmpl.php");