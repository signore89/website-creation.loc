<?
$router->get('post','posts/show.php');
$router->get('home','posts/index.php');
$router->get('edit-post','posts/edit.php');
$router->post('edit-post','posts/update.php');

$router->get('posts/create','posts/create.php');

$router->post('posts','posts/store.php');
$router->delete('posts','posts/destroy.php');
$router->patch('posts',"posts/rates.php");


$router->get('registration','registration.php');
$router->post('registration','registration.php');
$router->get('about','about.php');
$router->get('login','login.php');
$router->post('login','login.php');
