<?
global $db;
$id = (int)$_GET['id'];

$post = $db->query("SELECT * FROM `posts` WHERE `post_id` = ?", [$id])->findOrAbort();
$header = $title = $post['title'];

require_once VIEWS."/posts/edit.tmpl.php";