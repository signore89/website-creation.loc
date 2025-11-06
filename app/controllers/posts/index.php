<?
global $db;
require_once MODELS."/Pagination.php";
$title = "Сайт";
$header = "Недавние посты";

$page = $_GET['page'] ?? 1;
$total = $db->query('SELECT COUNT(*) FROM `posts`')->getColumn(); // общее количество
$pagination = new Pagination($page,$total);

$start_id = $pagination->getStartId();
$posts = $db->query("SELECT * FROM `posts` ORDER BY `post_id` DESC LIMIT $start_id, $pagination->perPage")->findAll();
require_once(VIEWS."/posts/index.tmpl.php");