<?
global $db;
$title = "Сайт";
$header = "Недавние посты";
$posts = $db->query("SELECT * FROM `posts` ORDER BY `post_id` DESC")->findAll();
require_once(VIEWS."/posts/index.tmpl.php");